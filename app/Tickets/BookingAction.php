<?php declare(strict_types=1);

namespace App\Tickets;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class BookingAction
{
    use AsController;

    public function handle(MovieSession $movieSession, User $user)
    {
        return DB::transaction(fn () => MovieSession::lockForUpdate()->findOrFail($movieSession->id)->bookTo($user));
    }

    public function asController(ActionRequest $request, MovieSession $movieSession)
    {
        $this->handle($movieSession, $request->user());
        return redirect()->to(route('home'))->with('success', __('Ingresso comprado com sucesso'));
    }
}
