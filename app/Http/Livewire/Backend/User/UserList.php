<?php

namespace App\Http\Livewire\Backend\User;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $form = [];
    public $updateForm = [];
    public $user;
    protected $listeners = ['confirmDelete'];

    // store data
    public function store()
    {
        $validateData = Validator::make($this->form, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ])->validate();

        $user = User::create($validateData);

        if ($user) {
            $this->reset();
            session()->flash('success', 'Data Store Successfully');
        } else{
            session()->flash('error', 'Data Store Successfully');
        }
    }

    //edit modal open
    public function editUser(User $users)
    {
        $this->updateForm = $users->toArray();
        $this->dispatchBrowserEvent('open-modal');
    }
    //update edit data
    public function updateUserData()
    {
        $validateDataUpdate = Validator::make($this->updateForm, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $this->updateForm['id'],
            'password' => 'confirmed',
        ])->validate();

        $user = User::find($this->updateForm['id'])->update($validateDataUpdate);
        
        if ($user) {
            $this->reset();
            session()->flash('success', 'Data Stored Successfully');
            $this->dispatchBrowserEvent('hide-form');
        } else{
            session()->flash('error', 'Data Store Successfully');
        }
        
    }


    public function delete(User $user)
    {
        $this->user = $user;
        $this->emit('delete');
    }

    public function confirmDelete()
    {
        $this->user->delete();
    }


    public function render()
    {
        $data['userList'] = User::paginate(10);
        return view('livewire.backend.user.user-list', $data)->layout('backend.layouts.master');
    }
}
