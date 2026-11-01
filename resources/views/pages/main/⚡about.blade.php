<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
   
 {!! \Illuminate\Support\Str::markdown(
        str_replace(['\\n', '\\r'], ["\n", ''], 'Mengenal Neural Network\n\nNeural Network atau jaringan saraf tiruan merupakan salah satu pendekatan dalam Machine Learning yang terinspirasi dari cara kerja neuron pada otak manusia.\n\n Model ini terdiri dari beberapa lapisan, yaitu Input Layer, Hidden Layer, dan Output Layer. Setiap neu')
    ) !!}    

</div>