<?php

namespace App\Tickets;

use App\Models\User;
use App\Exceptions\IllegalStateException;
use Illuminate\Database\Eloquent\Model;

class MovieSession extends Model
{
    protected $guarded = [];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookTo(User $user)
    {
        throw_if($this->soldOut(), new IllegalStateException(__('Nenhum assento disponível')));
        throw_if($this->alreadyBooked($user), new IllegalStateException(__('Você só pode comprar um assento')));

        $this->decrement('seats_available');

        $this->bookings()->save(new Booking(['user_id' => $user->getKey()]));
        $this->refresh();
    }

    public function soldOut()
    {
        return $this->seats_available <= 0;
    }

    // TODO: na verdade o mesmo usuário pode comprar mais de 1 ingresso, informando o cpfs diferentes.
    public function alreadyBooked(User $user)
    {
        return $this->bookings()->where('user_id', $user->getKey())->exists();
    }
}
