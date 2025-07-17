<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    // Automatically hash password when setting
    public function setPasswordAttributes($password){
        $this->attributes['password'] = Hash::make($password);
    }
    // JWT Methods
    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [
            'user_id'=> $this->id,
            'name'=> $this->name,
            'email'=> $this->email,
            'created_at'=> $this-> created_at-> toDateTimeString()
        ];
    }

    // For many-to-many re  lationship
    public function roles(){
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    // Helper method to check if user has a specific role
    public function hasRole($roleName){
        if(is_string($roleName)){
            return $this->roles->contains('name', $roleName);
        }

        return $roleName->intersect($this->roles)->isNotEmpty();
    }

    // Helper method to check if user has any of the given roles
    public function hasAnyRole($roles){
        if(is_string($roles)){
            return $this->hasRole($roles);
        }

        foreach($roles as $role){
            if($this->hasRole($role)){
                return true;
            }
        }

        return false;
    }

    // For simple role column approach
    public function isAdmin(){
        return  $this ->role === 'admin';
    }
    public function isModerator()
    {
        return $this->role === 'moderator';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

   
}