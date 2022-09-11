<x-app-layout>

<div class=" py-12">
    <div class="max-w-1xl mx-auto sm:px-10 lg:px-15">
        <!-- Cards Section -->

        <div class="container-fluid" >
            <div class="row">

                <div class="col-xl-4">

                    <div class="card">
                        <h5 class="card-header ">
                            Indicadores
                        </h5>
                        <div class="card-body">
                            {{-- primeira linha --}}
                            <div class="row">
                                <div class="col-xl-6">
                                    
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-inbound-fill"></i>                                    
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $enter_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Entrantes</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-plus-fill"></i>                                   
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $answer_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Atendidas</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            {{-- fim da primeira linha --}}

                            {{-- segunda linha --}}
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-x-fill"></i>                                     
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $abandon_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Abandonadas</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle-fill"></i>                                    
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $ctee }}</h6>
                                            <span class="text-success small pt-1 fw-bold">CTEE</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- fim da segunda linha --}}

                            {{-- terceira linha --}}
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-x-fill"></i>                                     
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $abandon_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Abandonadas</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle-fill"></i>                                    
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $ctee }}</h6>
                                            <span class="text-success small pt-1 fw-bold">CTEE</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- fim terceira linha --}}

                            {{-- quarta linha --}}
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-x-fill"></i>                                     
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $abandon_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Abandonadas</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle-fill"></i>                                    
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $ctee }}</h6>
                                            <span class="text-success small pt-1 fw-bold">CTEE</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- fim quarta linha --}}
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-x-fill"></i>                                     
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $abandon_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Abandonadas</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle-fill"></i>                                    
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $ctee }}</h6>
                                            <span class="text-success small pt-1 fw-bold">CTEE</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- fim quarta linha --}}

                            {{-- quinta linha --}}
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-x-fill"></i>                                     
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $abandon_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Abandonadas</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle-fill"></i>                                    
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $ctee }}</h6>
                                            <span class="text-success small pt-1 fw-bold">CTEE</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- fim quinta linha --}}

                            {{-- sexta linha --}}
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-telephone-x-fill"></i>                                     
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $abandon_queue }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Abandonadas</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center indicator-box">
                                        
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle-fill"></i>                                    
                                        </div>
                                        <div class="ps-3">
                                            
                                            <h6>{{ $ctee }}</h6>
                                            <span class="text-success small pt-1 fw-bold">CTEE</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- fim sexta linha --}}
                        </div>
                    </div>

                </div>
                {{-- end of column 1 --}}

                {{-- column 2 --}}

                <div class="col-xl-4">
                    <div class="card ">
                        <h5 class="card-header">
                            Ranking
                        </h5>
                        <div class="card-body overflow-auto">
                            <ul class="list-group list-group-flush d-flex  ">
                                <li class="list-group-item">
                                    @foreach ($notes as $note)
                                    
                                        @if($note->nota > 0 )
                                        <div class="row flex items-center">
                                            <div class="col-xl-2">
                                                <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            </div>
                                            
                                            <div class="col-xl-8 mb-1 flex items-center justify-between">
                                                {{ $note->name }}
                                                
                                            </div>
                                            
                                            <div class="col-xl-2"> {{ $note->nota }} </div>
                                            <hr>
                                            <br>
                                        </div>
                                        @endif
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- end of column 2 --}}

                {{-- column 3 --}}

                <div class="col-xl-4">
                    <div class="card">
                        <h5 class="card-header">
                            Gráficos
                        </h5>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <canvas id="pie-chart" width="250" height="250"></canvas>
                                    </div>
                                    <div class="col-xl-6" >
                                        <canvas id="pie-chart2" width="100" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <hr style="margin-top: 20%;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header">
                            Fluxo de atendimento
                        </h5>
                    </div>
                </div>
            </div>


            {{-- end of row principal --}}

            
                
        </div>
        {{-- end card section --}}


    
    </div>
            
    
            
            
</div>
</x-app-layout>