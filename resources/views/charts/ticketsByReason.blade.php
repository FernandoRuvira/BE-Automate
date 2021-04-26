<div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Tickets por motivos de visita</h3>

    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
    </div>
    </div>
    <div class="card-body">
        <canvas id="ticketsByReason" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@section('js')
	@parent
	<script src="{{ asset("js/charts/ticketsByReason.js") }}"></script>
    <script type="text/javascript">	
		getChartTicketsByReason('{{ url('/api/getDataTicketsByReason', '') }}');
	</script>
@stop