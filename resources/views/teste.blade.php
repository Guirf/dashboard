<x-app-layout>

    <div class=" py-12">
        <div class="max-w-1xl mx-auto sm:px-10 lg:px-15">
             <!-- Cards Section -->
                
    
                
                <div class="row">
                    
                    <div class="col-xxl-4 col-md-3">
                        <div class="container main-cards">
                            <h5 class="card-header">Ranking</h5>
                            <div class="row">
                                <div class="col-xxl-4 col-md-5">
                                    <div class="card info-card enter-queue">
                                        <div class="card-body">
                                            
                                            <h5 class="card-title">Entrantes</h5>
                                            <!-- icon -->
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-telephone-inbound-fill"></i>                                   
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $enter_queue }}</h6>
                                                    <span class="text-success small pt-1 fw-bold"></span>
                                                </div>
                                            </div>
                                            <!-- end icon -->
                                        </div>
                                    </div>
                                </div>
    
    
                                <div class="col-xxl-4 col-md-5">
                                    <!-- answer queue -->
                                    <div class="card info-card enter-queue">
                                        <div class="card-body">
                    
                                            <h5 class="card-title">Atendidas</h5>
                                            <!-- icon -->
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-telephone-plus-fill"></i>                                   
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $answer_queue }}</h6>
                                                    <span class="text-success small pt-1 fw-bold"></span>
                                                </div>
                                            </div>
                                            <!-- end icon -->
                                        </div>
                                    </div> 
                                </div>
                                <!-- end answer queue -->
                            </div>
    
                            <div class="row">
    
                                <div class="col-xxl-4 col-md-5">
                                    <!-- answer queue -->
                                    <div class="card info-card enter-queue">
                                        <div class="card-body">
                    
                                            <h5 class="card-title">Abandonadas</h5>
                                            <!-- icon -->
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-telephone-x-fill"></i>                                   
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $abandon_queue }}</h6>
                                                    <span class="text-success small pt-1 fw-bold"></span>
                                                </div>
                                            </div>
                                            <!-- end icon -->
                                        </div>
                                    </div> 
                                </div>
    
                                <div class="col-xxl-4 col-md-5">
                                    <!-- answer queue -->
                                    <div class="card info-card enter-queue">
                                        <div class="card-body">
                    
                                            <h5 class="card-title">CTEE</h5>
                                            <!-- icon -->
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-exclamation-triangle-fill"></i>                                   
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $ctee }}</h6>
                                                    <span class="text-success small pt-1 fw-bold"></span>
                                                </div>
                                            </div>
                                            <!-- end icon -->
                                        </div>
                                    </div> 
                                </div>
    
                            </div>
                        </div>
                    </div>
    
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card enter-queue">
                            <div class="card-body">
    
                                <h5 class="card-header">Ranking</h5>
                                
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach($notes as $note)
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <div>
                                                    <i class="bi bi-person-circle" style="font-size: 35px;"></i>
                                                </div>
                                                <div class="pl-3 email">
                                                    {{ $note->name }}
                                                </div>
                                            </td>
                                            <td>
                                                {{ $note->nota }}
                                            </td>
                                        </tr>                                                   
                                        @endforeach
                                    </tbody>
                                </table>
    
                            </div>
                        </div> 
                    </div>
                    
    
    
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card enter-queue">
                            <h5 class="card-header">Gráficos</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                            new Chart(document.querySelector('#doughnutChart'), {
                                                type: 'doughnut',
                                                toolbar: {
                                                show: true
                                                },
                                                data: {
                                                // labels: [
                                                //     'ótimo',
                                                //     'bom',
                                                //     'regular',
                                                //     'insatisfatório',
                                                //     'inaceitável'
                                                // ],
                                                datasets: [{
                                                    label: 'My First Dataset',
                                                    data: [300, 50, 100],
                                                    backgroundColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 205, 86)'
                                                    ],
                                                    hoverOffset: 4
                                                }]
                                                }
                                            }).render();
                                            });
                                        </script>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                                    
    
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>