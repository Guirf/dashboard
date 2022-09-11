<?php

$comb = "abcdefghi!@#$%*jklmnopqrstuvwx@!#@$#%*yzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*-+=";
$shfl = str_shuffle($comb);
$pwd = substr($shfl, 0, 12);

?>
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @can('users')
                        Dados do usuário
                    @elsecan('admin')
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ligações entrantes na fila</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-cart"></i>
                                                </div>
                                                <div>
                                                    <h5>
                                                        {{ $enter_queue }}
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ligações atentidas na fila</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-cart"></i>
                                                </div>
                                                <div>
                                                    <h5>

                                                        {{ $answer_queue }}

                                                    </h5>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ligações Abandonadas</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-cart"></i>
                                                </div>
                                                <div>
                                                    <h5>
                                                        {{ $abandon_queue }}

                                                    </h5>
                                                    {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Ramal</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Pontos</th>
                                <th scope="col">Status</th>
                                <th scope="col">Setor</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lists as $list)
                                <tr>
                                    <th scope="row"><?php echo $list->aors; ?></th>
                                    <td><?php echo $list->name; ?></td>

                                    <td>
                                        {{ $list->nota }}
                                    </td>

                                    <td>
                                        @foreach ($data as $info)
                                            @if ($info->endpoint == $list->aors)
                                                Online
                                            @else
                                                Offline
                                            @endif
                                        @endforeach
                                    </td>

                                    <td><?php echo $list->department; ?></td>
                                    <td scope="col" class="flex items-center space-x-1">
                                        @csrf
                                        <a href="/clicktocall/{{ Auth::user()->ramal }}/<?php echo $list->aors; ?>"><button
                                                type="button"><img width="30"
                                                    src="https://cdn-icons-png.flaticon.com/128/25/25453.png"></button><a>
                                                <a href="/delete/<?php echo $list->aors; ?>"><button type="button"><img width="35"
                                                            src="https://cdn-icons-png.flaticon.com/512/6932/6932392.png"></button><a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endcan
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
