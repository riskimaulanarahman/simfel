@extends('layouts.default', ['sidebarSearch' => true])

@section('title', 'Dashboard')

@section('content')
	<!-- begin row -->
	<div class="row">
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-teal">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-caret-square-down"></i></div>
				<div class="stats-content">
					<div class="stats-title">TOTAL SURAT MASUK (ALL)</div>
					<div class="stats-number">{{$totalsm}}</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Admin/Sekretaris</div>
						<li>Hari ini : <b>{{$todaysm1}}</b></li>
						<li>Minggu ini : <b>{{$weeksm1}}</b></li>
						<li>Bulan ini : <b>{{$monthsm1}}</b></li>
						<li>Total : <b>{{$totalsm1}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemerintahan & PP</div>
						<li>Hari ini : <b>{{$todaysm2}}</b></li>
						<li>Minggu ini : <b>{{$weeksm2}}</b></li>
						<li>Bulan ini : <b>{{$monthsm2}}</b></li>
						<li>Total : <b>{{$totalsm2}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Trantip & LH</div>
						<li>Hari ini : <b>{{$todaysm3}}</b></li>
						<li>Minggu ini : <b>{{$weeksm3}}</b></li>
						<li>Bulan ini : <b>{{$monthsm3}}</b></li>
						<li>Total : <b>{{$totalsm3}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemberdayaan Masyarakat</div>
						<li>Hari ini : <b>{{$todaysm4}}</b></li>
						<li>Minggu ini : <b>{{$weeksm4}}</b></li>
						<li>Bulan ini : <b>{{$monthsm4}}</b></li>
						<li>Total : <b>{{$totalsm4}}</b></li>
						<br>
					</div>

				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-caret-square-up"></i></div>
				<div class="stats-content">
					<div class="stats-title">TOTAL SURAT KELUAR (ALL)</div>
					<div class="stats-number">{{$totalsk}}</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Admin/Sekretaris</div>
						<li>Hari ini : <b>{{$todaysk1}}</b></li>
						<li>Minggu ini : <b>{{$weeksk1}}</b></li>
						<li>Bulan ini : <b>{{$monthsk1}}</b></li>
						<li>Total : <b>{{$totalsk1}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemerintahan & PP</div>
						<li>Hari ini : <b>{{$todaysk2}}</b></li>
						<li>Minggu ini : <b>{{$weeksk2}}</b></li>
						<li>Bulan ini : <b>{{$monthsk2}}</b></li>
						<li>Total : <b>{{$totalsk2}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Trantip & LH</div>
						<li>Hari ini : <b>{{$todaysk3}}</b></li>
						<li>Minggu ini : <b>{{$weeksk3}}</b></li>
						<li>Bulan ini : <b>{{$monthsk3}}</b></li>
						<li>Total : <b>{{$totalsk3}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemberdayaan Masyarakat</div>
						<li>Hari ini : <b>{{$todaysk4}}</b></li>
						<li>Minggu ini : <b>{{$weeksk4}}</b></li>
						<li>Bulan ini : <b>{{$monthsk4}}</b></li>
						<li>Total : <b>{{$totalsk4}}</b></li>
						<br>
					</div>

				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-indigo">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-book"></i></div>
				<div class="stats-content">
					<div class="stats-title">TOTAL SURAT PELAYANAN (ALL)</div>
					<div class="stats-number">{{$totalsp}}</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Admin/Sekretaris</div>
						<li>Hari ini : <b>{{$todaysp1}}</b></li>
						<li>Minggu ini : <b>{{$weeksp1}}</b></li>
						<li>Bulan ini : <b>{{$monthsp1}}</b></li>
						<li>Total : <b>{{$totalsp1}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemerintahan & PP</div>
						<li>Hari ini : <b>{{$todaysp2}}</b></li>
						<li>Minggu ini : <b>{{$weeksp2}}</b></li>
						<li>Bulan ini : <b>{{$monthsp2}}</b></li>
						<li>Total : <b>{{$totalsp2}}</b></li>
						<br>
					</div>
					{{-- <div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Trantip & LH</div>
						<li>Hari ini : <b>0</b></li>
						<li>Minggu ini : <b>0</b></li>
						<li>Bulan ini : <b>0</b></li>
						<li>Total : <b>0</b></li>
						<br>
					</div> --}}
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemberdayaan Masyarakat</div>
						<li>Hari ini : <b>{{$todaysp4}}</b></li>
						<li>Minggu ini : <b>{{$weeksp4}}</b></li>
						<li>Bulan ini : <b>{{$monthsp4}}</b></li>
						<li>Total : <b>{{$totalsp4}}</b></li>
						<br>
					</div>

				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-purple">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-book"></i></div>
				<div class="stats-content">
					<div class="stats-title">TOTAL SURAT VITAL (ALL)</div>
					<div class="stats-number">{{$totalsv}}</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Admin/Sekretaris</div>
						<li>Hari ini : <b>{{$todaysv1}}</b></li>
						<li>Minggu ini : <b>{{$weeksv1}}</b></li>
						<li>Bulan ini : <b>{{$monthsv1}}</b></li>
						<li>Total : <b>{{$totalsv1}}</b></li>
						<br>
					</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemerintahan & PP</div>
						<li>Hari ini : <b>{{$todaysv2}}</b></li>
						<li>Minggu ini : <b>{{$weeksv2}}</b></li>
						<li>Bulan ini : <b>{{$monthsv2}}</b></li>
						<li>Total : <b>{{$totalsv2}}</b></li>
						<br>
					</div>
					{{-- 
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div> --}}
					{{-- <div class="stats-desc">
					<div class="stats-title">Kasi Trantip & LH</div>
						<li>Hari ini : <b>0</b></li>
						<li>Minggu ini : <b>0</b></li>
						<li>Bulan ini : <b>0</b></li>
						<li>Total : <b>0</b></li>
						<br>
					</div> --}}
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 100%;"></div>
					</div>
					<div class="stats-desc">
					<div class="stats-title">Kasi Pemberdayaan Masyarakat</div>
						<li>Hari ini : <b>{{$todaysv4}}</b></li>
						<li>Minggu ini : <b>{{$weeksv4}}</b></li>
						<li>Bulan ini : <b>{{$monthsv4}}</b></li>
						<li>Total : <b>{{$totalsv4}}</b></li>
						<br>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- end row -->
@endsection