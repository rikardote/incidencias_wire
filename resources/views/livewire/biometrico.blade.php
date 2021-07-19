<div>
    @if(isset($empleados))
	 	<div class="row">

				{{--*/ $tmp = "" /*--}}
				@foreach($empleados as $empleado)
				<div class="table grid-cols-2">
					<table class="table">
						<thead>
							<tr>
								<th align="center">{{ $empleado->num_empleado }} -
								{{ $empleado->father_lastname }} {{ $empleado->mother_lastname }} {{ $empleado->name }}</th>
								<th></th>
								<th align="right">{{$empleado->horario}}</th>
							</tr>
						</thead>
						<thead>
							<th>Fecha</th>
							<th>Entrada</th>
							<th>Salida</th>
						</thead>
							@foreach ( $daterange as $date)
								<tr>
									{{--*/ $entrada = check_entrada($date->format("Y-m-d"), $empleado->num_empleado) /*--}}
									{{--*/ $salida =  check_salida($date->format("Y-m-d"), $empleado->num_empleado) /*--}}
									@if(!isweekend($date->format("Y-m-d")))
										<td> {{ $date->format("d/m/Y") }}</td>
										<td> {!! valida_entrada($empleado->num_empleado, $date->format("Y-m-d"), $entrada) !!}</td>
										@if($entrada != $salida)
											<td> {!! valida_salida($empleado->num_empleado, $date->format("Y-m-d"), $salida) !!}</td>
										@else
											<td></td>
										@endif
									@endif
								</tr>
							@endforeach

					</table>
				</div>
				@endforeach

			</table>
		</div>
	@endif

</div>
