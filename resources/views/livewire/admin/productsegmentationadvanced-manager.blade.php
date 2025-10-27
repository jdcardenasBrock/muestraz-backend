<!-- resources/views/livewire/admin/state-manager.blade.php -->

@php
    use Illuminate\Support\Facades\Crypt;
@endphp


<!DOCTYPE html>

 <div class="m-4">
    

<div>
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Listado</h5>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light text-center">
                                <tr class="bg-gray-200">
                                    <th class="p-2">Pregunta</th>
                                    <th class="p-2">Opcion</th>
                                    <th class="p-2">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($ProductSegmentationAdvanced as $ProductSegmentationAdvanced)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $ProductSegmentationAdvanced->question->question }}</td>                                        
                                        <td class="p-2">{{ $ProductSegmentationAdvanced->option->option_text }} 
                                        </td>
                                        <td class="p-2 space-x-2">
                                            <button wire:click="edit({{ $ProductSegmentationAdvanced->id }})"
                                                class="text-success btn btn-link waves-effect"><i
                                                    class="mdi mdi-pencil font-size-18"></i></button>
                                            <button wire:click="delete({{ $ProductSegmentationAdvanced->id }})"
                                                class="text-danger btn btn-link waves-effect"><i
                                                    class="mdi mdi-delete font-size-18"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Creación o Edición de Segmentos Avanzados</h5>
                    </div>
                    <div class="p-4 space-y-4 mt-4">
                        <form wire:submit.prevent="save" class="space-y-4">
                            <div class="row mb-4">
                                <label for="">Pregunta</label>
                                <select id="question" onupload="loadoption(this)" wire:model="question_id" type="text" class="form-select">
                                    <option value="">Seleccione una Pregunta</option>
                                    @foreach ($question as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="row mb-4">
                                <label for="">Opcion</label>
                                    <select id="option" wire:model="option_id" type="text" class="form-select">
                                        <option value="">Seleccione una Opcion</option>
                                        @foreach ($option as $option)
                                        
                                                <option value="{{ $option->id }}">{{ $option->option_text }}</option>
                                       
                                        @endforeach
                                    </select>
                            </div>

                            <div class="mt-3">
                                @if ($id)
                                    <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                @else
                                    <button type="submit" class="btn btn-success w-md">Crear</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
         
<script>

    document.addEventListener('DOMContentLoaded', function() {
    fetch('/get-data') // La ruta de Laravel que creaste
        .then(response => response.json())
        .then(data => {
            const dataSelect = document.getElementById('option');
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.option_text; // Ajusta según tus campos
                dataSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
});


    


</script>