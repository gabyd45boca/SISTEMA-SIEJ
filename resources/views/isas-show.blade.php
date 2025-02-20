@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
<style>
        .hidden-view {
            display: none;
        }
</style>
    <h1 class="m-0 text-dark">Mostrar Isa</h1>
@stop

@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')

 <div class ="row">

          <div class="col-lg-12">
          
          <div class="card mb-4">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      <form method= "POST" action="{{ route ('isas.update')}}" class="card-body">
              @csrf
             
              <div class="hidden-view">
              <x-adminlte-input type="hidden" name="isa_id"   value="{{$isa->id}}"/> 
              </div>

            <div class="table-responsive text-nowrap">
              <table id="isas" class="table table-stripted shadow-lg mt-4" with-buttons>
              <thead class="bg-dark text-white">
              <tr>
                <th>ID</th>
                <th>N° DJA</th>
                <th>N° DJ</th>
                <th>MOTIVO</th>
                <th>LEGAJO</th>
                <th>APELLIDO INFRACTOR</th>
                <th>NOMBRE INFRACTOR</th>
                <th>CONVERSION CONVALIDAR</th>
                <th>FECHA INGRESO</th>
                <th>ELEVADO INSTRUCCION</th>
                
              </tr>
              </thead>

              <tbody class="table-border-bottom-0">
              <tr>
                    <td>{{$isa->id}}</td>   
                    <td>{{$isa->num_dja}} </td>   
                    <td>{{$isa->num_dj}}</td>   
                                <td>
                                    @foreach ($isa->motivos as $motivo)
                                    {{$motivo->nombre_mot}} <br>
                                    @endforeach
                                </td>   
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->apellido_inf}} <br>
                                    @endforeach
                                </td>
                                
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->nombre_inf}} <br>
                                    @endforeach
                                </td>   
                    <td>{{$isa->conversion_convalid}}</td>   
                    <td>{{$isa->fecha_ingreso}}</td>  
                    <td>{{$isa->elevado_por_instruccion}}</td>
              </tr>
              </tbody>
              </table>
            </div>  
              <br>
              <br>                  
                                

                  <h4 class="fw-normal">1. Datos del expediente</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">N° DJA</label>
                      <span class="form-control" id="multicol-num_dja">{{ $isa-> num_dja}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_ingreso"> Fecha Ingreso</label>
                      <span class="form-control" id="multicol-fecha_ingreso">{{ $isa-> fecha_ingreso }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-num_dj"> N° DJ</label>
                      <span class="form-control" id="multicol-num_dj">{{ $isa-> num_dj }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-lugar_proced">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-lugar_proced">{{ $isa->lugar_proced }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_inicio"> Fecha Inicio de Actuaciones</label>
                      <span class="form-control" id="multicol-fecha_inicio">{{ $isa-> fecha_inicio }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fojas">Fojas</label>
                      <span class="form-control" id="multicol-fojas">{{ $isa-> fojas }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-deslindar_resp">Deslindar responsabilidad</label>
                      <span class="form-control" id="multicol-deslindar_resp">{{ $isa-> deslindar_resp }}</span>
                    </div>

                   
                    <div class="col-md-6">
                          <label class="form-label" for="multicol-nombre_mot">Motivo</label>
                          <br>
                          <span class="card" id="multicol-nombre_mot">
                              @foreach ($isa->motivos as $motivo)
                              {{$motivo->nombre_mot}}, 
                              @endforeach
                          </span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_movimiento"> Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_movimiento">{{ $isa->fecha_movimiento }}</span>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destino_pase">Lugar de Pase</label>
                      <span class="form-control" id="multicol-destino_pase">{{ $isa->destino_pase }}</span>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-observaciones">Observaciones del expediente</label>
                        <span class="form-control" id="multicol-observaciones">{{ $isa->observaciones }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-elevado_por_instruccion">Elevado por instruccion</label>
                      <span class="form-control" id="multicol-elevado_por_instruccion">{{ $isa->elevado_por_instruccion }}</span>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-opinion_sede_inst">Opinion Sede Inst</label>
                        <textarea class="form-control" id="multicol-opinion_sede_inst" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                            {{$isa->opinion_sede_inst}}
                        </textarea>
                    </div>                    

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-conversion_convalid">Conversion y convalidacion</label>
                      <span class="form-control" id="multicol-conversion_convalid">{{ $isa->conversion_convalid }}</span>
                    </div>
                           
                              
                  </div>
                              
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">2. Personal infractor</h4>
                  <div class="row g-3">
                    
                    <div class="col-md-12">
                          <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                          <br>
                          <span class="card" id="multicol-tipo_mov">
                              @foreach ($isa->infractors as $infractor)
                              {{$infractor->jerarquia_inf}} {{$infractor->apellido_inf}} {{$infractor->nombre_inf}} Lp: {{$infractor->leg_pers_inf }},
                              @endforeach
                          </span>
                    </div>
                                      
                  </div>
                 
                                               
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">3. Datos del personal instructor de la Direccion de Asuntos Internos</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_nombre_DAI">Apellido y Nombre</label>
                      <span class="form-control" id="multicol-apellido_nombre_DAI">{{ $isa->apellido_nombre_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DAI">Legajo Personal</label>
                      <span class="form-control" id="multicol-leg_pers_DAI">{{ $isa->leg_pers_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dependen_DAI">Dependencia</label>
                      <span class="form-control" id="multicol-dependen_DAI">{{ $isa->dependen_DAI }}</span>
                    </div>

                    <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DAI">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_DAI">{{ $isa->jerarquia_DAI }}</span>
                    </div>
                            

                  </div> 
           
             
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">4. Movimientos y sugerencias del instructor de la Direccion de Asuntos Internos </h4>
              <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-reg_interno_DAI">Registro Interno</label>
                      <span class="form-control" id="multicol-reg_interno_DAI">{{ $isa->reg_interno_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_proceDAI">Fecha de Procedencia</label>
                      <span class="form-control" id="multicol-fecha_mov_proceDAI">{{ $isa->fecha_mov_proceDAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_proceden_DAI">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-destin_proceden_DAI">{{ $isa->destin_proceden_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_DAI">Observaciones de Procedencia</label>
                      <span class="form-control" id="multicol-destin_proceden_DAI">{{ $isa->destin_proceden_DAI }}</span>
                    </div>
                   
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia DAI</label>
                        <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                            {{ $isa->sugerencia_DAI }}
                        </textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_elev_inst_DAI"> Fecha de Elevado por Instruccion</label>
                      <span class="form-control" id="multicol-fecha_elev_inst_DAI">{{ $isa->fecha_elev_inst_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseDAI"> Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_mov_paseDAI">{{ $isa->fecha_mov_paseDAI}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_DAI">Lugar de Pase</label>
                      <span class="form-control" id="multicol-destin_pase_DAI">{{ $isa->destin_pase_DAI}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_DAI">Observaciones de Pase</label>
                      <span class="form-control" id="multicol-obs_pase_DAI">{{ $isa->obs_pase_DAI}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-concluido_DAI">Concluido por Instruccion</label>
                      <span class="form-control" id="multicol-concluido_DAI">{{ $isa->concluido_DAI}}</span>
                    </div>
              </div>
           
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">5. Datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                          <span class="form-control" id="multicol-apellido_nombre_DGAJ">{{ $isa->apellido_nombre_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                          <span class="form-control" id="multicol-leg_pers_DGAJ">{{ $isa->leg_pers_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_DGAJ">Dependencia</label>
                            <span class="form-control" id="multicol-dependen_DGAJ">{{ $isa->dependen_DGAJ}}</span>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_DGAJ">{{ $isa->jerarquia_DGAJ}}</span>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">6. Movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
              <div class="row g-3">
                    
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_mov_proceDGAJ"> Fecha de Procedencia</label>
                          <span class="form-control" id="multicol-fecha_mov_proceDGAJ">{{ $isa->fecha_mov_proceDGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_proced_DGAJ">Lugar de Procedencia</label>
                          <span class="form-control" id="multicol-destin_proced_DGAJ">{{ $isa->destin_proced_DGAJ}}</span>
                        </div>
              

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia DGAJ</label>
                            <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $isa->sugerencia_DGAJ }}
                            </textarea>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_proced_DGAJ">Observaciones de la procedencia</label>
                          <span class="form-control" id="multicol-obs_proced_DGAJ">{{ $isa->obs_proced_DGAJ}}</span>
                        </div>
                        
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_mov_destDGAJ"> Fecha de Pase</label>
                          <span class="form-control" id="multicol-fecha_mov_destDGAJ">{{ $isa->fecha_mov_destDGAJ}}</span>
                        </div>


                        <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_pase_DGAJ">Lugar de Pase</label>
                          <span class="form-control" id="multicol-destin_pase_DGAJ">{{ $isa->destin_pase_DGAJ}}</span>
                        </div>
                     
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del pase</label>
                          <span class="form-control" id="multicol-obs_pase_DGAJ">{{ $isa->obs_pase_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-concluido_DGAJ">Concluido</label>
                          <span class="form-control" id="multicol-concluido_DGAJ">{{ $isa->concluido_DGAJ}}</span>
                        </div>
                    
              </div>
            
                              

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">7. Datos del personal instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                          <span class="form-control" id="multicol-apellido_nombre_AL">{{ $isa->apellido_nombre_AL}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                          <span class="form-control" id="multicol-leg_pers_AL">{{ $isa->leg_pers_AL}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                          <span class="form-control" id="multicol-dependen_AL">{{ $isa->dependen_AL}}</span>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_AL">{{ $isa->jerarquia_AL}}</span>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">8. Movimientos y sugerencias del instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-reg_interno_AL">Registro Interno</label>
                        <span class="form-control" id="multicol-reg_interno_AL">{{ $isa->reg_interno_AL}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_procAL">Fecha de Procedencia</label>
                      <span class="form-control" id="multicol-fecha_mov_procAL">{{ $isa->fecha_mov_procAL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_proceden_AL">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-destin_proceden_AL">{{ $isa->destin_proceden_AL}}</span>
                    </div>
            

                    <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia AL</label>
                            <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $isa->sugerencia_AL }}
                            </textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_AL">Observaciones de Procedencia</label>
                      <span class="form-control" id="multicol-obs_proced_AL">{{ $isa->obs_proced_AL}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseAL"> Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_mov_paseAL">{{ $isa->fecha_mov_paseAL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                      <span class="form-control" id="multicol-destin_pase_AL">{{ $isa->destin_pase_AL}}</span>
                    </div>
                  

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_AL">Observaciones del Pase</label>
                      <span class="form-control" id="multicol-obs_pase_AL">{{ $isa->obs_pase_AL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-concluido_AL">Concluido </label>
                      <span class="form-control" id="multicol-concluido_AL">{{ $isa->concluido_AL}}</span>
                    </div>
                    
              </div>
             
                             
                  <hr class="my-4 mx-n4" />
                    <h4 class="fw-normal">9. Datos del personal instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-apellido_nombre_DGRRHH">Apellido y Nombre</label>
                        <span class="form-control" id="multicol-apellido_nombre_DGRRHH">{{ $isa->apellido_nombre_DGRRHH}}</span>
                      </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
                      <span class="form-control" id="multicol-leg_pers_DGRRHH">{{ $isa->leg_pers_DGRRHH}}</span>
                    </div>
                    
                    <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                          <span class="form-control" id="multicol-dependen_DGRRHH">{{ $isa->dependen_DGRRHH}}</span>
                    </div>

                    <div class="col-md-6 select2-primary">
                      <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquia</label>
                      <span class="form-control" id="multicol-jerarquia_DGRRHH">{{ $isa->jerarquia_DGRRHH}}</span>
                    </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">10. Movimientos y resolucion final del instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-reg_interno_DGRRHH">Registro Interno</label>
                          <span class="form-control" id="multicol-reg_interno_DGRRHH">{{ $isa->reg_interno_DGRRHH}}</span>
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGRRHH">Fecha de Procedencia</label>
                        <span class="form-control" id="multicol-fecha_mov_proceDGRRHH">{{ $isa->fecha_mov_proceDGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_DGRRHH">Lugar de Procedencia</label>
                        <span class="form-control" id="multicol-destin_proceden_DGRRHH">{{ $isa->destin_proceden_DGRRHH}}</span>
                      </div>
                   

                      <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DAI">Resolucion Final</label>
                            <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $isa->resol_final_DGRRHH}}
                            </textarea>
                     </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de Procedencia</label>
                        <span class="form-control" id="multicol-obs_proced_DGRRHH">{{ $isa->obs_proced_DGRRHH}}</span>
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_paseDGRRHH">Fecha de Pase</label>
                        <span class="form-control" id="multicol-fecha_mov_paseDGRRHH">{{ $isa->fecha_mov_paseDGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_DGRRHH">Lugar de Pase</label>
                        <span class="form-control" id="multicol-destin_pase_DGRRHH">{{ $isa->destin_pase_DGRRHH}}</span>
                      </div>
                     

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_pase_DGRRHH">Observaciones de Pase</label>
                        <span class="form-control" id="multicol-obs_pase_DGRRHH">{{ $isa->obs_pase_DGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-concluido_DGRRHH">Concluido</label>
                        <span class="form-control" id="multicol-concluido_DGRRHH">{{ $isa->concluido_DGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-DGRRHH_N°">DGRRHH N°</label>
                        <span class="form-control" id="multicol-DGRRHH_N°">{{ $isa->DGRRHH_N°}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_notificacion"> Fecha de Notificacion</label>
                        <span class="form-control" id="multicol-fecha_notificacion">{{ $isa->fecha_notificacion}}</span>
                      </div>
                      
              </div>
            
    
                  <div class="pt-4">
                      <button type="button" class="btn btn-secondary" onClick="location.href='/isas'">Volver</button>
                  </div>
      </form>

  </div>
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
  $(document).ready(()=>{});
  $('#apellido_nombre_inf').selectpicker('val',@json($infractores_ids));
</script>

@endsection
