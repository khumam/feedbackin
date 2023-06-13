<?php

namespace App\Http\Livewire;

use App\Models\FeedbackForm;
use Livewire\Component;

class FeedbackFormAdminLivewire extends Component
{
    public $projectId = '';
    public $configs = [];

    public function mount()
    {
        $feedbackForm = FeedbackForm::where('user_id', Auth()->id())->where('project_id', $this->projectId)->latest()->first();
        $this->configs = collect(json_decode($feedbackForm->config));
    }

    public function updateDatabase()
    {
        FeedbackForm::where('user_id', Auth()->id())->where('project_id', $this->projectId)->update([
            'config' => json_encode($this->configs)
        ]);
    }

    public function toogleActive($configId)
    {
        $configs = $this->configs->map(function ($item) use ($configId) {
            if ($item['id'] === $configId) {
                $item['enable'] = !$item['enable'];
            }

            return (object) $item;
        });
        $this->configs = $configs;
        $this->updateDatabase();
    }

    public function render()
    {
        return view('livewire.feedback-form-admin-livewire');
    }
}
