<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class ModeAplikasi extends Component
{

    public $preferensi;

    protected $listeners = [
        'gantiMode' => 'handleGantiMode',
        'gantiVertical' => 'handleLayoutVertical',
        'gantiHorizontal' => 'handleLayoutHorizontal',
        'gantiTwoColumn' => 'gantiTwoColumn',
        'gantiTopBarLight' => 'gantiTopBarLight',
        'gantiTopBarDark' => 'gantiTopBarDark',
        'gantiSideBarLG' => 'gantiSideBarLG',
        'gantiSideBarMD' => 'gantiSideBarMD',
        'gantiSideBarSM' => 'gantiSideBarSM',
        'gantiSideBarSMH' => 'gantiSideBarSMH',
        'gantiSideBarDefault' => 'gantiSideBarDefault',
        'gantiSideBarDetached' => 'gantiSideBarDetached',
        'gantiSideBarLight' => 'gantiSideBarLight',
        'gantiSideBarDark' => 'gantiSideBarDark',
        'resetButton' => 'resetButton',
    ];

    public function handleGantiMode()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            if ($preferensi->mode_aplikasi == 'light') {
                $preferensi->update([
                    'mode_aplikasi' => 'dark',
                    'warna_sidebar' => 'dark'
                ]);
            } else {
                $preferensi->update([
                    'mode_aplikasi' => 'light',
                    'warna_sidebar' => 'light'
                ]);
            }
        } else {
            auth()->user()->preferensi()->create([
                'mode_aplikasi' => 'light',
                'warna_sidebar' => 'light'
            ]);
        }
    }

    public function handleLayoutVertical()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            $preferensi->update([
                'jenis_layout' => 'vertical',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'jenis_layout' => 'vertical',
            ]);
        }
    }
    public function handleLayoutHorizontal()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            $preferensi->update([
                'jenis_layout' => 'horizontal',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'jenis_layout' => 'horizontal',
            ]);
        }
    }

    public function gantiTwoColumn()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            $preferensi->update([
                'jenis_layout' => 'twocolumn',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'jenis_layout' => 'twocolumn',
            ]);
        }
    }

    public function gantiTopBarLight()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            $preferensi->update([
                'warna_topbar' => 'light',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'warna_topbar' => 'light',
            ]);
        }
    }

    public function gantiTopBarDark()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            $preferensi->update([
                'warna_topbar' => 'dark',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'warna_topbar' => 'dark',
            ]);
        }
    }

    public function gantiSideBarLG()
    {
        $preferensi = auth()->user()->preferensi()->first();

        if ($preferensi) {
            $preferensi->update([
                'ukuran_layout' => 'lg',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'ukuran_layout' => 'lg',
            ]);
        }
    }

    public function gantiSideBarMD()
    {
        $preferensi = auth()->user()->preferensi()->first();

        if ($preferensi) {
            $preferensi->update([
                'ukuran_layout' => 'md',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'ukuran_layout' => 'md',
            ]);
        }
    }

    public function gantiSideBarSM()
    {
        $preferensi = auth()->user()->preferensi()->first();

        if ($preferensi) {
            $preferensi->update([
                'ukuran_layout' => 'sm',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'ukuran_layout' => 'sm',
            ]);
        }
    }

    public function gantiSideBarSMH()
    {
        $preferensi = auth()->user()->preferensi()->first();

        if ($preferensi) {
            $preferensi->update([
                'ukuran_layout' => 'sm-hover',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'ukuran_layout' => 'sm-hover',
            ]);
        }
    }

    public function gantiSideBarDefault()
    {
        $preferensi = auth()->user()->preferensi()->first();

        if ($preferensi) {
            $preferensi->update([
                'tampilan_layout' => 'default',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'tampilan_layout' => 'default',
            ]);
        }
    }

    public function gantiSideBarDetached()
    {
        $preferensi = auth()->user()->preferensi()->first();

        if ($preferensi) {
            $preferensi->update([
                'tampilan_layout' => 'detached',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'tampilan_layout' => 'detached',
            ]);
        }
    }

    public function gantiSideBarLight()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            $preferensi->update([
                'warna_sidebar' => 'light',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'warna_sidebar' => 'light',
            ]);
        }
    }

    public function gantiSideBarDark()
    {
        $preferensi = auth()->user()->preferensi()->first();
        if ($preferensi) {
            $preferensi->update([
                'warna_sidebar' => 'dark',
            ]);
        } else {
            auth()->user()->preferensi()->create([
                'warna_sidebar' => 'dark',
            ]);
        }
    }



    public function resetButton()
    {
        $preferensi = auth()->user()->preferensi()->first();

        if ($preferensi) {
            $preferensi->update([
                'ukuran_layout' => 'lg',
                'warna_sidebar' => 'dark',
                'tampilan_layout' => 'default',
                'jenis_layout' => 'vertical',
                'mode_aplikasi' => 'light',

            ]);
        } else {
            auth()->user()->preferensi()->create([
                'ukuran_layout' => 'lg',
                'warna_sidebar' => 'dark',
                'tampilan_layout' => 'default',
                'jenis_layout' => 'vertical',
                'mode_aplikasi' => 'light',

            ]);
        }
    }

    public function render()
    {
        return view('livewire.mode-aplikasi');
    }
}
