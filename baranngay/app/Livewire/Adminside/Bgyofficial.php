<?php

namespace App\Livewire\Adminside;
use App\Models\Officials;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
class Bgyofficial extends Component
{
    use Actions;
    use WithPagination;
    public $fullname, $purok,$gender, $age, $status, $subid,$subdata, $id;
    public $cardModal = false;
    public $search = '';

    public function render()
    {
        $officials = Officials::where('fullname', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.adminside.bgyofficial', ['officials' => $officials]);
    }

    public function searchh()
    {
        $this->render();

    }

    public function resett(){
        $this->reset('fullname');
        $this->reset('age');
        $this->reset('gender');
        $this->reset('status');
        $this->reset('purok');
    }
    public function resetFields()
    {
        // Reset the form fields
        $this->fullname = '';
        $this->purok = '';
        $this->gender = '';
        $this->age = '';
        $this->status = '';
    }

    protected $rules = [
        'fullname' => 'required',
        'purok' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'status' => 'required',

    ];

    public function addofficial(){
        $this->validate();
        $officials= new Officials();
        $officials->fullname = $this->fullname;
        $officials->purok = $this->purok;
        $officials->gender = $this->gender;
        $officials->age = $this->age;
        $officials->status = $this->status;
        $officials->save();
        $this->resetFields();
        $this->notification()->success(
            $title = 'Data saved',
            $description = 'Official was successfully added!'
        );



    }

    public function edit($id)
{
    dd($this->id);
    $official = Officials::find($id);

    if ($official) {
        $this->id = $official->id; // Store the ID for updating
        $this->subid = $id;
        $this->fullname = $official->fullname;
        $this->purok = $official->purok;
        $this->gender = $official->gender;
        $this->age = $official->age;
        $this->status = $official->status;

        // Show the update modal
        $this->cardModal = 'update'; // Update the modal identifier
    }
}

public function updateofficial()
{
    $this->validate(); // Perform validation as you did for adding

    // Find the official by ID and update the fields
    $official = Officials::find($this->id);

    if ($official) {
        $official->fullname = $this->fullname;
        $official->purok = $this->purok;
        $official->gender = $this->gender;
        $official->age = $this->age;
        $official->status = $this->status;
        $official->save();

        // Reset form fields and close the modal
        $this->resetFields();
        $this->cardModal = false;

        // Display a success notification
        $this->notification()->success(
            $title = 'Data updated',
            $description = 'Official was successfully updated!'
        );
    }
}


    }


