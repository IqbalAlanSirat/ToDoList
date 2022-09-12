@extends('lay.AdminLay')

@section('content')
<!-- Main content -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row">
	    <div class="col-sm-6">
	      <h1 class="m-0 text-dark">Permohonan Fasiliti</h1>
	    </div>
{{-- 	    <div class="col-sm-6">
	      <ol class="breadcrumb float-sm-right">
	        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="menu">Dashboard</a></li>
	        <li class="breadcrumb-item"><a href="{{ url('/Senarai-Permohonan') }}" class="menu">Senarai</a></li>
	        <li class="breadcrumb-item active">Permohonan</li>
	      </ol>
	    </div> --}}
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid" id="body1">
		<div class="card card-primary card-outline">
			<div class="card-body">
				<form class="form-horizontal" id="form1">
					@csrf
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="Sesi" class="col-sm-3 col-form-label">Bil Mesyuarat :</label>
						<div class="col-sm-6"  id="Sesi">
							<div class="input-group">
								<select class="form-control select2-p" name="option0" id="option0">
									@foreach ($Sesis as $Sesi)
										<option value="{{$Sesi->id}}">{{$Sesi->Sesi}}/{{$Sesi->Tahun}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="P_JIPT" class="col-sm-3 col-form-label">Institusi Pengajian Tinggi :</label>
						<div class="col-sm-6"  id="P_JIPT">
							<div class="input-group">
								<select class="form-control select2-p" name="option1" id="option1"> 
									<option disabled="" selected value="0">Sila Pilih institusi Pengajian Tinggi</option>
									@foreach ($Ipts as $ipt)
										<option value="{{$ipt->id}}">{{$ipt->Nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="P_IPT" class="col-sm-3 col-form-label">Program Pengajian :</label>
						<div class="col-sm-6" id="P_IPT">
							<div class="input-group" >
								<select class="form-control select2-p" name="option3" id="option3">
									<option disabled="" selected="" value="0">Sila Pilih Program Pengajian</option>
									@foreach ($ProgramPengajians as $ProgramPengajian)
										<option value="{{$ProgramPengajian->id}}">{{$ProgramPengajian->Nama}}</option>
									@endforeach
										<option value="LainLain">Lain-Lain</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row ProgramBaru">
						<label class="col-sm-1"></label>
						<label class="col-sm-3"></label>
						<div class="col-sm-6 input-group" id="ProgramPengajian">
							<input type="text" class="form-control" name="ProgramPengajian" id="text1" value="" placeholder="Sila Masuk Nama Program Pengajian">
						</div>
					</div>
					<div class="form-group row ProgramBaru">
						<label class="col-sm-1"></label>
						<label class="col-sm-3"></label>
						<div class="col-sm-6">
							<div class="input-group" id="TahapPengajian">
								<select class="form-control select2-p" name="option3_1" id="option3_1">
									<option disabled="" selected="" value="0">Sila Pilih Tahap Program Pengajian</option>
									@foreach ($Tahaps as $Tahap)
										<option value="{{$Tahap->id}}">{{$Tahap->Tahap}}</option>								
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row ProgramBaru">
						<label class="col-sm-1"></label>
						<label class="col-sm-3"></label>
						<div class="col-sm-6" id="KodPengajian">
							<div class="input-group">
								<select class="form-control select2-p" name="option3_2" id="option3_2">
									<option disabled="" selected="" value="0">Sila Pilih Kod Program Pengajian</option>
									@foreach ($Kod_Pengajians as $Kod_Pengajian)
										<option value="{{$Kod_Pengajian->id}}">{{$Kod_Pengajian->Nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="P_JP" class="col-sm-3 col-form-label">Jenis Permohonan:</label>
						<div class="col-sm-6" id="P_JP">
							<div class="input-group">
								<input type="hidden" name="hidtext2" id="hidtext2" value="">
								<select class="form-control select2-p" name="option2" id="option2">
									<option disabled="" selected="" value="0">Sila Pilih Jenis Permohonan</option>
									<option value="Baru">Baharu</option>
									<option value="Pembaharuan">Pembaharuan</option>
									<option value="Tambahan">Tambahan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="MoA" class="col-sm-3 col-form-label">Tempoh MoA</label>
						<div class="col-sm-6 input-group" id="MoA">
							<p id="Tiada">Tidak Berkenaan</p>
							<div id="Ada" hidden>
								<div class="form-inline">
									<div class="col-sm-6">
										<label style="font-weight: normal;">Tarikh mula MoA :</label>
									</div>
									<div class="col-sm-6">
										<input id="startDate" />
									</div>	
								</div>
								<div class="form-inline mt-2" style="">
									<div class="col-sm-6">
										<label style="font-weight: normal;">Tarikh tamat MoA :</label>
									</div>
									<div class="col-sm-6">
										<input id="endDate"/>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Bilangan kuota pelajar :</label>
						<div class="col-sm-6 form-inline" id="BilKoutaPelajar">
							<input type="number" class="form-control" min="0" max="1000" id="num1" name="num1" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Jumlah Pengambilan setahun:</label>
						<div class="col-sm-6 form-inline" id="JumPengambilan">
							<input type="number" class="form-control" min="0" max="1000" id="num2" name="num2" value="">
							&ensp;Pengambilan
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Bilangan keseluruhan pelajar :</label>
						<div class="col-sm-6 form-inline" id="BilKeseluruhanPelajar">
							<input type="number" class="form-control" min="0" max="1000" id="num3" name="num3" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Unjuran pengambilan pelajar /Tahun :</label>
						<div class="col-sm-6 form-inline" id="unjuran">
							<input type="number" class="form-control" min="0" max="1000" id="num4" name="num4" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Nisbah 1 Clinical Instructor:</label>	
						<div class="col-sm-6 form-inline" id="Nisbah">
							<input type="number" class="form-control" min="0" max="1000" id="num5" name="num5" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Nisbah 1 Pensyarah:</label>
						<div class="col-sm-6 form-inline" id="Nisbah">
							<input type="number" class="form-control" min="0" max="1000" id="num6" name="num6" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					{{-- <div class="form-group row DivFasilitiMoA" hidden>
						<label class="col-sm-1"></label>
						<label for="FasilitiMoA" class="col-sm-3 col-form-label">Senarai Fasiliti Dalam MoA :<br>(Sedia Ada)</label>
						<div class="col-sm-6" id="FasilitiMoA">
							<div class="input-group">
								<select class="form-control select2-p" name="option4" id="option4">
									<option disabled="" selected="" value="0">Sila Pilih Fasiliti</option>
									@foreach ($Fasilitis as $Fasiliti)
										<option value='{"id" : "{{$Fasiliti->id}}", "Nama": "{{$Fasiliti->Nama}}"}'>{{$Fasiliti->Nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-1">
							<button type="button" id="button1" class="btn bg-gradient-success" onclick="btn1()"><i class="fas fa-plus"></i></button>
						</div>
					</div>
					<div class="form-group row DivFasilitiMoA" hidden>
						<div class="col-sm-4"></div>
						<div class="col-sm-6">
							<ol id="listfasilitimoa">
								<li>Tiada Data</li>
							</ol>
						</div>
					</div> --}}
					<div class="form-group row" id="FasilitiLine">
						<label class="col-sm-1"></label>
						<label for="P_Fasiliti" class="col-sm-3 col-form-label">Senarai Fasiliti Yang Di Mohon:</label>
						<div class="col-sm-6 " id="P_Fasiliti">
							<div class="input-group">
								<select class="form-control select2-p" id="option5">
									<option disabled="" selected="" value="0">Sila Pilih Fasiliti</option>
									@foreach ($Fasilitis as $Fasiliti)
										<option value='{"id" : "{{$Fasiliti->id}}", "Nama": "{{$Fasiliti->Nama}}"}'>{{$Fasiliti->Nama}}</option>
									@endforeach
								</select>
	            </div>
						</div>
						<div class="col-sm-1">
							<button type="button" id="button1" class="btn bg-gradient-success" onclick="btn2()"><i class="fas fa-plus"></i></button>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4"></div>
						<div class="col-sm-6">
							<ol id="listfasilitidimohon">
								<li>Tiada Data</li>
							</ol>
							{{-- <div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="checkbox1">
							  <label class="form-check-label" for="checkbox1">
							    Sama seperti senarai fasiliti dalam MoA
							  </label>
							</div> --}}
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-2"></label>
					  <button type="button"  class="btn bg-gradient-success" data-toggle="tooltip" data-placement="top" id="btnHantar"><i class="fas fa-paper-plane">&ensp;</i>Hantar</button>
					</div>
				</form>
				<!-- /.form-horizontal -->
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
  </div>
  <!-- /.container-fluid -->
  <div class="container-fluid" id="body2" hidden>
		<div class="card card-warning card-outline">
			<div class="card-body">
				<form class="form-horizontal" method="post" action="#">
					@csrf
					<input type="hidden" id="HidKemaskinitext" name="idPermohonan" value="">
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="KemaskiniSesi" class="col-sm-3 col-form-label">Bil Mesyuarat :</label>
						<div class="col-sm-6"  id="KemaskiniSesi">
							<div class="input-group">
								<select class="form-control select2-p" name="option0" id="Kemaskinioption0">
									@foreach ($Sesis as $Sesi)
										<option value="{{$Sesi->id}}">{{$Sesi->Sesi}}/{{$Sesi->Tahun}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="KemaskiniIPT" class="col-sm-3 col-form-label">Institusi Pengajian Tinggi :</label>
						<div class="col-sm-6" id="KemaskiniIPT">
							<div class="input-group" >
								<select class="form-control select2-p" name="option1" id="Kemaskinioption1"> 
									<option disabled="" selected="" value="0">Sila Pilih institusi Pengajian Tinggi</option>
									@foreach ($Ipts as $ipt)
										<option value="{{$ipt->id}}">{{$ipt->Nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="KemaskiniProgram" class="col-sm-3 col-form-label">Program Pengajian :</label>
						<div class="col-sm-6" id="KemaskiniProgram">
							<div class="input-group">
								{{-- <div class="input-group-prepend">
							  	<span class="input-group-text">
								    <i class="fas fa-school"></i>
								  </span>
								</div> --}}
								<select class="form-control select2-p" name="option3" id="Kemaskinioption3">
									<option disabled="" selected="" value="disabled">Sila Pilih Program Pengajian</option>
									@foreach ($ProgramPengajians as $ProgramPengajian)
										<option value="{{$ProgramPengajian->id}}">{{$ProgramPengajian->Nama}}</option>
									@endforeach
										<option value="LainLain">Lain-Lain</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row KemaskiniProgramBaru">
						<label class="col-sm-1"></label>
						<label class="col-sm-3"></label>
						<div class="col-sm-6 input-group" id="KemaskiniProgramPengajian">
							<input type="text" class="form-control" name="ProgramPengajian" id="Kemaskinitext1" value="" placeholder="Sila Masuk Nama Program Pengajian">
						</div>
					</div>
					<div class="form-group row KemaskiniProgramBaru">
						<label class="col-sm-1"></label>
						<label class="col-sm-3"></label>
						<div class="col-sm-6 " id="KemaskiniTahapPengajian">
							<div class="input-group">
								<select class="form-control select2-p" name="option3_1" id="Kemaskinioption3_1">
									<option disabled="" selected="" value="disabled">Sila Pilih Tahap Program Pengajian</option>
									@foreach ($Tahaps as $Tahap)
										<option value="{{$Tahap->id}}">{{$Tahap->Tahap}}</option>								
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row KemaskiniProgramBaru">
						<label class="col-sm-1"></label>
						<label class="col-sm-3"></label>
						<div class="col-sm-6" id="KemaskiniKodPengajian">
							<div class="input-group">
								<select class="form-control select2-p" name="option3_2" id="Kemaskinioption3_2">
									<option disabled="" selected="" value="disabled">Sila Pilih Kod Program Pengajian</option>
									@foreach ($Kod_Pengajians as $Kod_Pengajian)
										<option value="{{$Kod_Pengajian->id}}">{{$Kod_Pengajian->Nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="KemaskiniJenisPermohonan" class="col-sm-3 col-form-label">Jenis Permohonan:</label>
						<div class="col-sm-6" id="KemaskiniJenisPermohonan">
							<div class="input-group">
								<select class="form-control select2-p" name="option2" id="Kemaskinioption2">
									<option disabled="" selected="" value="0">Sila Pilih Perjanjian</option>
									<option value="Baru">Baru</option>
									<option value="Pembaharuan">Pembaharuan</option>
									<option value="Tambahan">Tambahan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label for="KemaskiniMoA" class="col-sm-3 col-form-label">Tempoh MoA</label>
						<div class="col-sm-6 input-group" id="KemaskiniMoA">
							<p id="KemaskiniTiada">Tidak Berkenaan</p>
							<div id="KemaskiniAda" hidden>
								<div class="form-inline">
									<div class="col-sm-6">
										<label style="font-weight: normal;">Tarikh mula MoA :</label>
									</div>
									<div class="col-sm-6">
										<input id="KemaskinistartDate" />
									</div>	
								</div>
								<div class="form-inline mt-2" style="">
									<div class="col-sm-6">
										<label style="font-weight: normal;">Tarikh tamat MoA :</label>
									</div>
									<div class="col-sm-6">
										<input id="KemaskiniendDate"/>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Bilangan kuota pelajar :</label>
						<div class="col-sm-6 form-inline" id="KemaskiniBilKoutaPelajar">
							<input type="number" class="form-control" min="0" max="1000" id="Kemaskininum1" name="num1" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Jumlah Pengambilan setahun:</label>
						<div class="col-sm-6 form-inline" id="KemaskiniJumPengambilan">
							<input type="number" class="form-control" min="0" max="1000" id="Kemaskininum2" name="num2" value="">
							&ensp;Pengambilan
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Bilangan keseluruhan pelajar :</label>
						<div class="col-sm-6 form-inline" id="KemaskiniBilKeseluruhanPelajar">
							<input type="number" class="form-control" min="0" max="1000" id="Kemaskininum3" name="num3" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Unjuran pengambilan pelajar /Tahun :</label>
						<div class="col-sm-6 form-inline" id="Kemaskiniunjuran">
							<input type="number" class="form-control" min="0" max="1000" id="Kemaskininum4" name="num4" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Nisbah 1 Clinical Instructor:</label>	
						<div class="col-sm-6 form-inline" id="KemaskiniNisbah">
							<input type="number" class="form-control" min="0" max="1000" id="Kemaskininum5" name="num5" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1"></label>
						<label class="col-sm-3">Nisbah 1 Pensyarah:</label>
						<div class="col-sm-6 form-inline" id="KemaskiniNisbah">
							<input type="number" class="form-control" min="0" max="1000" id="Kemaskininum6" name="num6" value="">
							&ensp;<label style="font-weight:normal;">Pelajar</label>
						</div>
					</div>
					{{-- <div class="form-group row KemaskiniDivFasilitiMoA" hidden>
						<label class="col-sm-1"></label>
						<label for="KemaskiniFasilitiMoA" class="col-sm-3 col-form-label">Senarai Fasiliti Dalam MoA :<br>(Sedia Ada)</label>
						<div class="col-sm-6" id="KemaskiniFasilitiMoA">
							<div class="input-group">
								<select class="form-control select2-p" name="option4" id="Kemaskinioption4">
									<option disabled="" selected="" value="0">Sila Pilih Fasiliti</option>
									@foreach ($Fasilitis as $Fasiliti)
										<option value='{"id" : "{{$Fasiliti->id}}", "Nama": "{{$Fasiliti->Nama}}"}'>{{$Fasiliti->Nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-1">
							<button type="button" id="Kemaskinibutton1" class="btn bg-gradient-success" onclick="Kemaskinibtn1()"><i class="fas fa-plus"></i></button>
						</div>
					</div>
					<div class="form-group row KemaskiniDivFasilitiMoA" hidden>
						<div class="col-sm-4"></div>
						<div class="col-sm-6">
							<ol id="Kemaskinilistfasilitimoa">
								<li>Tiada Data</li>
							</ol>
						</div>
					</div> --}}
					<div class="form-group row" id="KemaskiniFasilitiLine">
						<label class="col-sm-1"></label>
						<label for="KemaskiniFasilitidimohon" class="col-sm-3 col-form-label">Senarai Fasiliti Yang Di Mohon:</label>
						<div class="col-sm-6 " id="KemaskiniFasilitidimohon">
							<div class="input-group">
								<select class="form-control select2-p" id="Kemaskinioption5">
									<option disabled="" selected="" value="0">Sila Pilih Fasiliti</option>
									@foreach ($Fasilitis as $Fasiliti)
										<option value='{"id" : "{{$Fasiliti->id}}", "Nama": "{{$Fasiliti->Nama}}"}'>{{$Fasiliti->Nama}}</option>
									@endforeach
								</select>
	            </div>
						</div>
						<div class="col-sm-1">
							<button type="button" id="Kemaskinibutton1" class="btn bg-gradient-success" onclick="Kemaskinibtn2()"><i class="fas fa-plus"></i></button>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4"></div>
						<div class="col-sm-6">
							<ol id="Kemaskinilistfasilitidimohon">
								<li>Tiada Data</li>
							</ol>
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-sm-2"></label>
					  <button type="submit"  class="btn bg-gradient-primary" id="btnSimpan"><i class="fas fa-paper-plane">&ensp;</i>Simpan</button>&emsp;
					  <button type="button"  class="btn bg-gradient-danger" id="ButtonBatal"><i class="fas fa-times"></i></i>&ensp;</i>Batal</button>&emsp;
					  <button type="button"  class="btn bg-gradient-danger" data-toggle="modal" data-target="#deleteFacilityModal" data-id="" id="btndelete"><i class="fas fa-trash-alt">&ensp;</i>Delete</button>
					</div>
				</form>
			</div>
		</div>  
	</div>
	<div id="chart">
</div>
  <div class="container-fluid">
  	<div class="card card-primary card-outline">
  		<div class="card-body" style="overflow-x: auto;">
				<table class="table table-bordered table-hover bg-white" id="permohonanTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama IPT</th>
							<th>Program Pengajian</th>
							<th>Status</th>
						</tr>
					</thead>
				</table>
      </div>
  	</div>
  </div>
</div>
<!-- /.content -->

<div class="modal fade" id="deleteFacilityModal" tabindex="-1" role="dialog" aria-labelledby="deleteFacilityModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="#" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-body">
        	<p class="text-center"><i class="fas fa-exclamation text-danger fa-5x"></i></p>
        	<p class="text-center text-secondary">Anda pasti ingin hapus permohonan ini?</p>
        	<input type="hidden" id="hidtext" name="hidtext" value="">
        </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-secondary batal" data-dismiss="modal">Batal</button>
        	<button type="button" class="btn btn-danger delete">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
	$(function() {
	    var table = $('#permohonanTable').DataTable({
	        processing: true,
	        serverSide: true,
	        language:{
	        	url: '{{asset('js/language.json')}}'
	        },
	        ajax: '{{ route('SenaraiPermohonan') }}',
	        columns: [
	        		{data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            { data: 'NamaIpt', name: 'NamaIpt' },
	            { data: 'NamaProgram', name: 'NamaProgram' },
	            { data: 'Status', name: 'Status',  orderable: false, searchable: false  }
	        ]
	    });
	    table.on('draw.dt', function() {
	        $('[data-toggle="tooltip"]').tooltip();
	    });
	    $('.delete').on( 'click', function () {
	    	var id = $('#hidtext').val();
	    	$.ajax({
    	    url: '{{url('PadamPermohonan')}}/'+id,
    	    type: 'DELETE',
    	    data: {
    	    	"id": id
    	    },
    	    success: function(data) {
    	        console.log(data);
							table.draw();
							$('#deleteFacilityModal').modal('toggle');
							$('.modal-backdrop').remove();
							toastr.success(data.message);
							clearForm();
    	    }
	    	});
	    });
	});
	$.ajaxSetup({
  			    headers: {
  			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			    }
  			});
	// var clickbtn1 = 'no';
	var clickbtn2 = 'no';
	let FasilitiDipohon =[];
	// let FasilitiMoA =[]; //ni tak perlu dh
	let error =[];
	$(document).ready(function(){
		$('#deleteFacilityModal').on('show.bs.modal', function (event) {
		    var button = $(event.relatedTarget) ;
		    var permohonan = button.data("id");
		    var modal = $(this);
		    modal.find('#hidtext').val(permohonan);
		    // alert(permohonan);
		})
		$('#startDate').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			// minDate: today,
			maxDate: function () {
				return $('#endDate').val();
			}
		});
		$('#endDate').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			minDate: function () {
				return $('#startDate').val();
			}
		});
		$('[data-toggle="tooltip"]').tooltip();
    var table = $('#example2').DataTable({
      "info": false,
      "order": [[4, 'asc']],
      "aoColumnDefs": [ 
        { "bSortable": false, "aTargets": [ 0, 6 ] }
      ],
      "language":{
        "lengthMenu": "Papar _MENU_ Data",
        "search": "Carian:",
        "paginate": {
          "first":      "Pertama",
          "last":       "Terakhir",
          "next":       "Seterusnya",
          "previous":   "Sebelumnya"
        },
        "zeroRecords": "Tiada rekod yang sepadan ditemui",
      },
      "dom": 'frtlp',
    });

    table.on('order.dt search.dt', function(){
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){
          cell.innerHTML = i+1;
        });
      }).draw();
		$('.textarea').summernote({
			disableDragAndDrop: true,
			toolbar:[
				['style', ['bold', 'italic', 'underline', 'clear']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['table', ['table']],
		    ['height', ['height']]
			]
		});
  	$('.select2-p').select2();
  	$('.select2-q').select2();

  	// $("#form1").valid();
  	$('#btnHantar').click(function(e){
  		let valid = 'yes';
  		let op0 = document.getElementById("option0").value;
  		let op1 = document.getElementById("option1").value;
  		let op2 = document.getElementById("option2").value;
  		let op3 = document.getElementById("option3").value;
  		let op3_1 = document.getElementById("option3_1").value;
  		let op3_2 = document.getElementById("option3_2").value;
  		let tx1 = document.getElementById("text1").value;
  		let date1 = document.getElementById("startDate").value;
  		let date2 = document.getElementById("endDate").value;
  		let num1 = document.getElementById("num1").value;
  		let num2 = document.getElementById("num2").value;
  		let num3 = document.getElementById("num3").value;
  		let num4 = document.getElementById("num4").value;
  		let num5 = document.getElementById("num5").value;
  		let num6 = document.getElementById("num6").value;
  		if (op1 === '0'){
  			valid = 'no';
  			error.push('Sila Pilih Institusi Pengajian Tinggi');
  		}
  		if (op2 === '0'){
  			valid = 'no';
  			error.push('Sila Pilih Perjanjian');
  		}else if(op2 != 'Baru'){
  			if (date1 === '') {
  				valid = 'no';
  				error.push('Sila Pilih tempoh mula MoA');
  			}
  			if (date2 === '') {
  				valid = 'no';
  				error.push('Sila Pilih tempoh tamat MoA');
  			}
  		}
  		if (op3 === 'LainLain'){
  			if(tx1 === ''){
	  			valid = 'no';
	  			error.push('Sila Isi Nama Program Pengajian');
  			}
  			if (op3_1 === '0') {
  				valid = 'no';
	  			error.push('Sila Pilih Kod Program Pengajian');
  			}
  			if (op3_2 === '0') {
  				valid = 'no';
	  			error.push('Sila Pilih Kod Program Pengajian');
  			}
  		}
  		if (op3 === '0'){
  			valid = 'no';
  			error.push('Sila Pilih Program Pengajian');
  		}
  		if (num1 === '') {
  			valid = 'no';
  			error.push('Sila Isi Bilangan Kouta Pelajar');
  		}
  		if (num2 === '') {
  			valid = 'no';
  			error.push('Sila Isi Jumlah Pengambilan');
  		}
  		if (num3 === '') {
  			valid = 'no';
  			error.push('Sila Isi Bilangan Keseluruhan Pelajar');
  		}
  		if (num4 === '') {
  			valid = 'no';
  			error.push('Sila Isi Unjuran Pengambilan Pelajar');
  		}
  		if (num5 === '') {
  			valid = 'no';
  			error.push('Sila Isi Nisbah Clinical Instructor');
  		}
  		if (num6 === '') {
  			valid = 'no';
  			error.push('Sila Isi Bilangan Kouta Pelajar');
  		}
  		if (error.length == 0) {
  			e.preventDefault();
  			
  			$.ajax({
  				url:"{{route('Permohonan')}}",
  				method: 'post',
  				data:{
  					option0: op0,
  					option1: op1,
  					option2: op2,
  					option3: op3,
  					option3_1: op3_1,
  					option3_2: op3_2,
  					text1: tx1,
  					num1: num1,
  					num2: num2,
  					num3: num3,
  					num4: num4,
  					num5: num5,
  					num6: num6,
  					date1: date1,
  					date2: date2,
  					fasilitidipohon : FasilitiDipohon,
  					// fasilitimoa : FasilitiMoA, ni tak perlu dh
  				},
  				success: function(data){
  					if (data.alert == 'success') {
  						toastr.success(data.message);
  						if (op3 === 'LainLain') {
  							var newOption = new Option(data.PNama, data.PId, false, false);
  							$('#Kemaskinioption3').append(newOption).trigger('change');
  						}
  						$('#permohonanTable').DataTable().ajax.reload();
  						clearForm();
  					}else{
   						let errmsg = "";
  						$.each(data.message, function (index, element) {
  							errmsg+="<li>"+element+"</li>";
  						})
   						toastr.error('<ol>'+errmsg+'</ol>');
  					}
  					console.log(data);
  				}
  			});
   		}else{
   			let errmsg = "";
   			let i = 1;
   				$.each(error, function(index, element){
   					errmsg+="<li>"+element+"</li>";
   					// error.shift();
   					i++;
   				})
   			toastr.error('<ol>'+errmsg+'</ol>');
  			console.log(date1, date2);
  			error = [];
  		}
  	});

  	$('#option2').change(function(){
			if (this.value == "Baru") {
      	$('#Tiada').removeAttr('hidden');//utk tempoh moa
				$("#Ada").attr("hidden",true);//utk tempoh moa
				// $('.DivFasilitiMoA').attr("hidden",true); ni tak perlu dh

			}else{
				// $('.DivFasilitiMoA').removeAttr('hidden'); ni tak perlu dh
				$('#Ada').removeAttr('hidden');//utk tempoh moa
				$("#Tiada").attr("hidden",true);//utk tempoh moa
			}
  	});

  	$(".ProgramBaru").hide();

  	$('#option1, #option3').change(function(){
  		clearform1();
  	});

  	$('#option2').change(function() {
  		if ($(this).val()!= null) {
	  		if ($('#option1').val() != null) {
	  			if ($('#option3').val() != null) {
	  				if ($('#option3').val() != 'LainLain') {
							$.get("{{ url('api/dropdownOpt3')}}", 
							{ option2: $(this).val(), option1: $("#option1").val(), option3 : $("#option3").val()},
							function(data) {
								// console.log(data.data2);
								// if (data.data2 != 'none') {
								// 	$.each(data.data2, function(index, element) {
								// 		console.log(element);
								// 	})
								// }
								if(data.data != 'none'){
									$("#startDate").val(data.message.TempohMoAMula);
									$("#endDate").val(data.message.TempohMoATamat);
									$("#num1").val(data.message.KoutaPelajar);
									$("#num2").val(data.message.JumlahPengambilan);
									$("#num3").val(data.message.KeseluruhanPelajar);
									$("#num4").val(data.message.UnjuranPelajar);
									$("#num5").val(data.message.NisbahClinicalInstructor);
									$("#num6").val(data.message.NisbahPensyarah);
								}else{
									$("#startDate").val();
									$("#endDate").val();
									$("#num1").val();
									$("#num2").val();
									$("#num3").val();
									$("#num4").val();
									$("#num5").val();
									$("#num6").val();
								}

								// if(data.data2 != 'none'){
								// 	if (clickbtn1 == 'no') {
								// 		setclickbtn1();
								// 	}
								// 	$("#listfasilitimoa").empty();
								// 	FasilitiMoA =[];
								// 	console.log(clickbtn1);  
								// 	$.each(data.data2, function (index, element) {
								// 		addFasilitiMoA(element);
						  // 			$("#listfasilitimoa").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="deletefasilitimoa('+ element.id +')"></i></li>');
								// 	});
								// 	console.log(clickbtn1, FasilitiMoA);

								// }else{
								// 	FasilitiMoA =[];
								// 	$("#listfasilitimoa").empty();

								// } ni tak perlu dh
							});
	  				}
	  			}else{
	  				toastr.error('Sila Pilih Program Pengajian');
	  				$("#option2").val('0');
	      		$("#option2").trigger('change');
	  			}
	  		}else{
	  			toastr.error('Sila Pilih Institusi Pengajian Tinggi');
	  			$("#option2").val('0');
	      	$("#option2").trigger('change');
	  		}
  		}
  	});
  	$('#option3').change(function(){
			if (this.value != "LainLain") {
				// $('.ProgramBaru').hide(1000);
				$(".ProgramBaru").slideUp("slow");
			}else{
				// $(".ProgramBaru").show(1000);
				$(".ProgramBaru").slideDown("slow");
			}
			// $.get("{{ url('api/dropdownOpt3')}}", 
			// { option: $(this).val(), idPermohonan: $("#idPermohonan").val(), idPerjanjian : $("#id_perjanjian").val()},
			// function(data) {
			// 	console.log(data);
			// 	toastr.success(data.message);
			// 	var option4 = $('#option4');
			// 	option4.empty();
			// 	$("#listFasiliti").empty();
			// 	$("#listfasilitidimohon").empty();
			// 	$("#listfasilitidimohon").append("<li>Tiada Data</li>");
			// 		if(data.n == null){
			// 			$("#listFasiliti").append("<li>Tiada Data</li>");
			// 		}
			// 	$.each(data.n, function(index, element) {
			// 		if(element.Gugur==0){
			// 			$("#listFasiliti").append("<li>"+element.NamaFasiliti+"&emsp;<i style='color: red;' data-placement='top' data-toggle='tooltip' title='Gugur'onclick='d("+element.id+");' class='fas fa-trash-alt'></li>");
			// 		}else{
			// 			$("#listFasiliti").append("<li style='color: red'>"+element.NamaFasiliti+"&emsp;<i style='color: black;' data-placement='top' data-toggle='tooltip' title='Restore' onclick='d("+element.id+");' class='fas fa-trash-restore-alt'></li>");
			// 		}
		 //    });
			// 	$('[data-toggle="tooltip"]').tooltip();
			// 	option4.append("<option disabled selected value='disabled'>----Sila Pilih Fasiliti----</option>");
			// 	$.each(data.e, function(index, element) {
	  //       option4.append("<option value='"+ element.id +"'>" + element.Nama + "</option>");
	  //       console.log(index, element.NamaKursus);
	  //     });
			// });
			// alert(this.value);
  	});
  	$('#option5').change(function(){
  		// {'id' : '2', 'Nama': 'Hospital Batu Pahat'}
  		// var data = JSON.parse(this.value);
  		// alert(data.id);
  		// $("#listfasilitidimohon").append('<li>'+data.Nama+'</li>');
  	});

  	// $('#checkbox1').change(function() {
   //    if(this.checked) {
			// 	let Duplicate = 0;
   //      FasilitiDipohon = FasilitiMoA;

   //      $.each(FasilitiDipohon, function(index1, element1){
   //      	$.each(FasilitiMoA, function(index2, element2) {
   //      		if (element.id == data.id) {
   //      			Duplicate = 1;
   //      		}
			// 				$("#listfasilitidimohon").append('<li>'+element1.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="deletefasilitimoa('+ element1.id +')"></i></li>');
   //      console.log(FasilitiDipohon);
   //      console.log(FasilitiMoA);
						
   //      	})
   //      });

   //    }else{
   //    	FasilitiDipohon = [];
   //    	console.log(FasilitiDipohon);
   //      console.log(FasilitiMoA);
   //    }       
   //  });
	})

	function d(id) {
		var ask = confirm("Anda pasti ?");
		if (ask === true) {
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"').attr('content')
				}
			})
			$.ajax({
				url: "{{url('api/GugurFasilitiSediaAda')}}/"+id,
				method:'delete',
				data: {
					idPermohonan: $("#idPermohonan").val(),
					idPerjanjian: $("#option2").val(),
					idProgramPengajian: $("#option3").val(),
				},
				success:function(data) {
					console.log(data);
					$("#listFasiliti").empty();
					$.each(data.fasilitis, function(index, element) {
						if(element.Gugur==0){
							$("#listFasiliti").append("<li>"+element.NamaFasiliti+"&emsp;<i style='color: red;' data-placement='top' data-toggle='tooltip' title='Gugur'onclick='d("+element.id+");' class='fas fa-trash-alt'></li>");
						}else{
							$("#listFasiliti").append("<li style='color: red'>"+element.NamaFasiliti+"&emsp;<i style='color: black;' data-placement='top' data-toggle='tooltip' title='Restore' onclick='d("+element.id+");' class='fas fa-trash-restore-alt'></li>");
						}
			    });
				}
			})
			console.log('true');
		}else{
			console.log('false');
		}
	}

	function clearform1(){
		$("#startDate").val('');
		$("#endDate").val('');
		$("#num1").val('');
		$("#num2").val('');
		$("#num3").val('');
		$("#num4").val('');
		$("#num5").val('');
		$("#num6").val('');
		$("#option2").val('0');
    $("#option2").trigger('change');
		// FasilitiMoA =[];
		// $("#listfasilitimoa").empty();
		// $("#listfasilitimoa").append('<li> Tiada Data </li>');


		console.log('clearform1');
	}
	// function setclickbtn1(){
	// 	clickbtn1 = 'yes';
	// };
	function setclickbtn2(){
		clickbtn2 = 'yes';
	};

	function addFasilitiDipohon(data) {
		FasilitiDipohon.push(data);
	}
	// function addFasilitiMoA(data) {
	// 	FasilitiMoA.push(data);
	// }
	// function btn1(){
	// 	let opt4 = document.getElementById("option4").value;
	// 	// <option value='{"id" : "$Fasiliti->id", "Nama": "$Fasiliti->Nama"}'>$Fasiliti->Nama</option>
	// 	if(opt4 != "0"){
	// 		if (clickbtn1 == 'no') {
	// 			setclickbtn1();
	// 			$("#listfasilitimoa").empty();
	// 		}
	// 		let data = JSON.parse(opt4);
	// 		let Duplicate = 0;
	// 		$.each(FasilitiMoA, function(index, element){
	// 			if (element.id == data.id) {
	// 				Duplicate = 1;
	// 		    toastr.error('Fasiliti sudah di senaraikan');
	// 			}
	// 		});
	// 		if (Duplicate == 0) {
	// 			addFasilitiMoA(data);
 //  			$("#listfasilitimoa").append('<li>'+data.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="deletefasilitimoa('+ data.id +')"></i></li>');
	// 		}
	// 		console.log(Duplicate);
	// 		// let jsondata = JSON.stringify(FasilitiMoA);
	// 		console.log(data);
	// 		$("#option4").val('0');
 //      $("#option4").trigger('change');
	// 	}else{
	//     toastr.error('Sila pilih fasiliti untuk dimohon');
	// 	}
	// }
	function btn2(){
		let opt5 = document.getElementById("option5").value;
		if(opt5 != "0"){
			if (clickbtn2 == 'no') {
				setclickbtn2();
				$("#listfasilitidimohon").empty();
			}
			let data = JSON.parse(opt5);
			let Duplicate = 0;
			$.each(FasilitiDipohon, function(index, element){
				if (element.id == data.id) {
					Duplicate = 1;
			    toastr.error('Fasiliti sudah di senaraikan');
				}
			});
			if (Duplicate == 0) {
				addFasilitiDipohon(data);
  			$("#listfasilitidimohon").append('<li>'+data.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="deletefasiliti('+ data.id +')"></i></li>');
			}
			console.log(Duplicate);
			$("#option5").val('0');
      $("#option5").trigger('change');
		}else{
	    toastr.error('Sila pilih fasiliti untuk dimohon');
		}
	}
	// function deletefasilitimoa(fasiliti) {
	// 	let c = confirm("Anda pasti ?");
	// 	if (c == true){
	// 		FasilitiMoA.splice(FasilitiMoA.findIndex(v => v.id  == fasiliti), 1);
	// 		console.log(FasilitiMoA);
	// 		$("#listfasilitimoa").empty();

	// 		$.each(FasilitiMoA, function(indexe, element){
	// 			$("#listfasilitimoa").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="deletefasilitimoa('+ element.id +')"></i></li>');
	// 		});

	// 		if (FasilitiMoA.length === 0) {
	// 			$("#listfasilitimoa").append('<li> Tiada Data </li>');
	// 			clickbtn1 = 'no';
	// 		}
	// 	}
	// }
	function deletefasiliti(fasiliti) {
		let c = confirm("Anda pasti ?");
		if (c == true){
			FasilitiDipohon.splice(FasilitiDipohon.findIndex(v => v.id  == fasiliti), 1);
			console.log(FasilitiDipohon);
			$("#listfasilitidimohon").empty();

			$.each(FasilitiDipohon, function(indexe, element){
				$("#listfasilitidimohon").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="deletefasiliti('+ element.id +')"></i></li>');
			});

			if (FasilitiDipohon.length === 0) {
				$("#listfasilitidimohon").append('<li> Tiada Data </li>');
				clickbtn2 = 'no';
			}
		}	
	}
	// var i=0;
	// function addrow(){
	// 	var u = document.getElementById('fake').hidden = true;
	// 	var g = document.getElementById('tablePermohonan').hidden = false;
	// 	i++;
	// 	var table = document.getElementById('tableFasiliti');
	// 	var rowCount = table.rows.lenght;
	// 	var row = table.insertRow(rowCount);
	// 	var td = document.createElement('td');
		
	// 	//insert index number column
	// 	td = row.insertCell();
	// 	var eleL = document.createElement('innerHtml');
	// 	// eleL.textContent = i;
	// 	td.appendChild(eleL);

	// 	//insert Nama Fasiliti column
	// 	td = row.insertCell();
	// 	var eleI = document.createElement('innerHtml');
	// 	eleI.textContent = PilihFasiliti.value;
	// 	td.appendChild(eleI);
	// 	var eleI = document.createElement('input');
	// 	eleI.setAttribute('type', 'text');
	// 	eleI.setAttribute('name', 'HiddenFasiliti');
	// 	eleI.setAttribute('value', PilihFasiliti.value);
	// 	eleI.setAttribute('readonly', '');
	// 	eleI.setAttribute('hidden', '');
	// 	td.appendChild(eleI);

	// 	//insert Nama Negeri column
	// 	td = row.insertCell();
	// 	var eleI = document.createElement('innerHtml');
	// 	eleI.textContent = PilihNegeri.value;
	// 	td.appendChild(eleI);
	// 	var eleI = document.createElement('input');
	// 	eleI.setAttribute('type', 'text');
	// 	eleI.setAttribute('name', 'HiddenNegeri');
	// 	eleI.setAttribute('value', PilihNegeri.value);
	// 	eleI.setAttribute('readonly', '');
	// 	eleI.setAttribute('hidden', '');
	// 	td.appendChild(eleI);

	// 	//Bilangan pelajar column
	// 	td = row.insertCell();
	// 	td.setAttribute('style', 'text-align: center;');
	// 	var eleI = document.createElement('innerHtml');
	// 	eleI.textContent = BilanganPelajar.value;
	// 	td.appendChild(eleI);

	// 	//kapisiti column
	// 	td = row.insertCell();
	// 	td.setAttribute('style', 'text-align: center;');
	// 	var eleI = document.createElement('innerHtml');
	// 	eleI.textContent = '81';
	// 	td.appendChild(eleI);

	// 	//delete button
	// 	td = row.insertCell();
	// 	var html = '';
	// 	html += '<button type="button" class="btn bg-gradient-danger" onclick="deleteRow(this)" id="removeit"><i class="fas fa-minus"></i></button>';
	// 	$(td).append(html);

	// 	//set fasiliti field to default
	// 	$('#PilihFasiliti').val('disabled');
	// 	$('#PilihFasiliti').trigger('change');
	// 	//set fasiliti field to default
	// 	$('#PilihNegeri').val('disabled');
	// 	$('#PilihNegeri').trigger('change');
	// 	//set Bilangan pelajar field to 0
	// 	$('#BilanganPelajar').val('');
	// 	$('#BilanganPelajar').trigger('change');
	// 	//set fasiliti field and add button editable
	// 	var t = document.getElementById("PilihFasiliti").disabled = true;
	// 	var t = document.getElementById("BilanganPelajar").disabled = true;
	// 	var t = document.getElementById("add").disabled = true;


	// 	var hiddenText = document.getElementById('hiddenInput'); 
	// }

	// function masuk(f){
	// 	var idInput = f.id;

	// 	if (idInput == "PilihNegeri") {
	// 		var t = document.getElementById("PilihFasiliti").disabled = false;
	// 	}
	// 	else if (idInput == "PilihFasiliti"){
	// 		var t = document.getElementById("BilanganPelajar").disabled = false;
	// 	}else if (idInput == "BilanganPelajar"){
	// 		var t = document.getElementById("add").disabled = false;
	// 	}
	// }

	// function deleteRow(btn) {
	// 	i--;
	//   var row = btn.parentNode.parentNode;
	//   row.parentNode.removeChild(row);
	//   if (i == 0){
	//   	var u = document.getElementById('fake').hidden = false;
	//   	var g = document.getElementById('tablePermohonan').hidden = true;
	//   }
	// }
</script>
<script type="text/javascript">
	var Kemaskiniclickbtn2 = 'yes';
	let KemaskiniFasilitiDipohon = [];
	let Kemaskinierror =[];
	var FromAjax =0;
	// var Kemaskiniclickbtn1 = 'yes'; ni tak perlu dh
	// let KemaskiniFasilitiMoA =[]; ni tak perlu dh

	function kemaskini(id){
		FromAjax = 0;
		// KemaskiniFasilitiMoA.splice(0, KemaskiniFasilitiMoA.length); ni tak perlu dh
		KemaskiniFasilitiDipohon.splice(0, KemaskiniFasilitiDipohon.length);
		$('#body2').removeAttr('hidden');
		$("#body1").attr("hidden",true);
		document.getElementById('body2').scrollIntoView();
		$.ajax({
			url: '{{ url('PaparKemaskini') }}/'+id,
			type: 'get',
			dataType: 'json',
			success: function(data){
				// console.log(data, 'kemaskini');
				$("#Kemaskinioption0").val(data.e.id_sesi);
				$("#Kemaskinioption1").val(data.e.id_ipt);
				$("#Kemaskinioption3").val(data.e.id_ProgramPengajian);
      	$("#Kemaskinioption0").trigger('change');
      	$("#Kemaskinioption1").trigger('change');
      	$("#Kemaskinioption3").trigger('change');
				$("#Kemaskinioption2").val(data.e.JenisPermohonan);
      	$("#Kemaskinioption2").trigger('change');
				$("#HidKemaskinitext").val(data.e.id);
				$("#KemaskinistartDate").val(data.e.TempohMoAMula);
				$("#KemaskiniendDate").val(data.e.TempohMoATamat);
				$("#Kemaskininum1").val(data.e.KoutaPelajar);
				$("#Kemaskininum2").val(data.e.JumlahPengambilan);
				$("#Kemaskininum3").val(data.e.KeseluruhanPelajar);
				$("#Kemaskininum4").val(data.e.UnjuranPelajar);
				$("#Kemaskininum5").val(data.e.NisbahClinicalInstructor);
				$("#Kemaskininum6").val(data.e.NisbahPensyarah);
		    $('#btndelete').data("id", id);

				$("#Kemaskinilistfasilitidimohon").empty();
      	$.each(data.fm, function(index, element){
  				$("#Kemaskinilistfasilitidimohon").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="Kemaskinideletefasiliti('+ element.id +')"></i></li>');
					KemaskiniaddFasilitiDipohon(element);
      	});
     //  	if (data.e.JenisPermohonan != 'Baru' ) {
					// $("#Kemaskinilistfasilitimoa").empty();
     //  		$.each(data.fmoa, function(index, element){
  			// 	$("#Kemaskinilistfasilitimoa").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="Kemaskinideletefasilitimoa('+ element.id +')"></i></li>');
					// 	KemaskiniaddFasilitiMoA(element);
					// 	console.log(element.id);
     //  		});
     //  	} ni tak perlu dh
      	// console.log(KemaskiniFasilitiMoA, KemaskiniFasilitiDipohon);
			},error: function () {
				console.log('Someting went wrong');
			}
		});
	}

	// function clicked() {
	// 	FromAjax++;
 //  	console.log('FormAjax change', FromAjax);
	// }

	$(document).ready(function(){


		var options = {
          series: [{
          name: 'Net Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


		$('#ButtonBatal').click(function() {
	    clearForm();
  	});
		$('#KemaskinistartDate').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			// minDate: today,
			maxDate: function () {
				return $('#KemaskiniendDate').val();
			}
		});
		$('#KemaskiniendDate').datepicker({
			uiLibrary: 'bootstrap4',
			iconsLibrary: 'fontawesome',
			minDate: function () {
				return $('#KemaskinistartDate').val();
			}
		});
		$('#Kemaskinioption2').change(function(){
			if (this.value == "Baru") {
      	$('#KemaskiniTiada').removeAttr('hidden');
				$("#KemaskiniAda").attr("hidden",true);
				// $('.KemaskiniDivFasilitiMoA').attr("hidden",true);

			}else{
				// $('.KemaskiniDivFasilitiMoA').removeAttr('hidden');
				$('#KemaskiniAda').removeAttr('hidden');
				$("#KemaskiniTiada").attr("hidden",true);
			}
  	});

  	$(".KemaskiniProgramBaru").hide();

  	$('#Kemaskinioption1, #Kemaskinioption3').change(function(){
  		console.log(FromAjax++, 'Kemaskiniclearform1');
  		Kemaskiniclearform1();
  		// if (FromAjax == 2) {
  		// 	console.log(FromAjax++);
  		// }
  	});

  	$('#Kemaskinioption2').change(function() {
  		console.log('kemaskini option 2', FromAjax);

  		if (FromAjax >= 5) {
  		console.log('option 2 >3');
	  		if ($(this).val()!= null) {
		  		if ($('#Kemaskinioption1').val() != null) {
		  			if ($('#Kemaskinioption3').val() != null) {
		  				if ($('#Kemaskinioption3').val() != 'LainLain') {
								$.get("{{ url('api/dropdownOpt3')}}", 
								{ option2: $(this).val(), option1: $("#Kemaskinioption1").val(), option3 : $("#Kemaskinioption3").val()},
								function(data) {
									console.log(FromAjax);
									// if (data.data2 != 'none') {
									// 	$.each(data.data2, function(index, element) {
									// 	})
									// } ni tak perlu dh
									if(data.data != 'none'){
											console.log(data.message, 'hai');
										$("#KemaskinistartDate").val(data.message.TempohMoAMula);
										$("#KemaskiniendDate").val(data.message.TempohMoATamat);
										$("#Kemaskininum1").val(data.message.KoutaPelajar);
										$("#Kemaskininum2").val(data.message.JumlahPengambilan);
										$("#Kemaskininum3").val(data.message.KeseluruhanPelajar);
										$("#Kemaskininum4").val(data.message.UnjuranPelajar);
										$("#Kemaskininum5").val(data.message.NisbahClinicalInstructor);
										$("#Kemaskininum6").val(data.message.NisbahPensyarah);
									}else{
										$("#KemaskinistartDate").val();
										$("#KemaskiniendDate").val();
										$("#Kemaskininum1").val();
										$("#Kemaskininum2").val();
										$("#Kemaskininum3").val();
										$("#Kemaskininum4").val();
										$("#Kemaskininum5").val();
										$("#Kemaskininum6").val();
									}

									// if(data.data2 != 'none'){
									// 	if (Kemaskiniclickbtn1 == 'no') {
									// 		Kemaskinisetclickbtn1();
									// 	}
									// 	$("#Kemaskinilistfasilitimoa").empty();
									// 	KemaskiniFasilitiMoA =[];
									// 	console.log(Kemaskiniclickbtn1);  
									// 	$.each(data.data2, function (index, element) {
									// 		KemaskiniaddFasilitiMoA(element);
							  // 			$("#Kemaskinilistfasilitimoa").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="Kemaskinideletefasilitimoa('+ element.id +')"></i></li>');
									// 	});

									// }else{
									// 	if (FromAjax != 3) {
									// 		KemaskiniFasilitiMoA =[];
									// 		$("#Kemaskinilistfasilitimoa").empty();
									// 		console.log('Change option');
									// 	}

									// } ni tak perlu dh
								});
		  				}
		  			}else{
		  				toastr.error('Sila Pilih Program Pengajian');
		  				$("#Kemaskinioption2").val('0');
		      		$("#Kemaskinioption2").trigger('change');
		  			}
		  		}else{
		  			toastr.error('Sila Pilih Institusi Pengajian Tinggi');
		  			$("#Kemaskinioption2").val('0');
		      	$("#Kemaskinioption2").trigger('change');
		  		}
	  		}
	  	}else{
  			console.log('option 2 =3');
  			if (FromAjax >2) {}
	  		FromAjax++;
	  	}
  	});
  	
  	$('#Kemaskinioption3').change(function(){
			if (this.value != "LainLain") {
				$(".KemaskiniProgramBaru").slideUp("slow");
			}else{
				$(".KemaskiniProgramBaru").slideDown("slow");
			}
  	});

  	$('#btnSimpan').click(function(e){
  		let valid = 'yes';
  		let idP = document.getElementById("HidKemaskinitext").value;
  		let op0 = document.getElementById("Kemaskinioption0").value;
  		let op1 = document.getElementById("Kemaskinioption1").value;
  		let op2 = document.getElementById("Kemaskinioption2").value;
  		let op3 = document.getElementById("Kemaskinioption3").value;
  		let op3_1 = document.getElementById("Kemaskinioption3_1").value;
  		let op3_2 = document.getElementById("Kemaskinioption3_2").value;
  		let tx1 = document.getElementById("Kemaskinitext1").value;
  		let date1 = document.getElementById("KemaskinistartDate").value;
  		let date2 = document.getElementById("KemaskiniendDate").value;
  		let num1 = document.getElementById("Kemaskininum1").value;
  		let num2 = document.getElementById("Kemaskininum2").value;
  		let num3 = document.getElementById("Kemaskininum3").value;
  		let num4 = document.getElementById("Kemaskininum4").value;
  		let num5 = document.getElementById("Kemaskininum5").value;
  		let num6 = document.getElementById("Kemaskininum6").value;
  		if (op1 === '0'){
  			valid = 'no';
  			Kemaskinierror.push('Sila Pilih Institusi Pengajian Tinggi');
  		}
  		if (op2 === '0'){
  			valid = 'no';
  			Kemaskinierror.push('Sila Pilih Perjanjian');
  		}else if(op2 != 'Baru'){
  			if (date1 === '') {
  				valid = 'no';
  				Kemaskinierror.push('Sila Pilih tempoh mula MoA');
  			}
  			if (date2 === '') {
  				valid = 'no';
  				Kemaskinierror.push('Sila Pilih tempoh tamat MoA');
  			}
  		}
  		if (op3 === 'LainLain'){
  			if(tx1 === ''){
	  			valid = 'no';
	  			Kemaskinierror.push('Sila Isi Nama Program Pengajian');
  			}
  			if (op3_1 === '0') {
  				valid = 'no';
	  			Kemaskinierror.push('Sila Pilih Kod Program Pengajian');
  			}
  			if (op3_2 === '0') {
  				valid = 'no';
	  			Kemaskinierror.push('Sila Pilih Kod Program Pengajian');
  			}
  		}
  		if (op3 === '0'){
  			valid = 'no';
  			Kemaskinierror.push('Sila Pilih Program Pengajian');
  		}
  		if (num1 === '') {
  			valid = 'no';
  			Kemaskinierror.push('Sila Isi Bilangan Kouta Pelajar');
  		}
  		if (num2 === '') {
  			valid = 'no';
  			Kemaskinierror.push('Sila Isi Jumlah Pengambilan');
  		}
  		if (num3 === '') {
  			valid = 'no';
  			Kemaskinierror.push('Sila Isi Bilangan Keseluruhan Pelajar');
  		}
  		if (num4 === '') {
  			valid = 'no';
  			Kemaskinierror.push('Sila Isi Unjuran Pengambilan Pelajar');
  		}
  		if (num5 === '') {
  			valid = 'no';
  			Kemaskinierror.push('Sila Isi Nisbah Clinical Instructor');
  		}
  		if (num6 === '') {
  			valid = 'no';
  			Kemaskinierror.push('Sila Isi Bilangan Kouta Pelajar');
  		}
  		if (Kemaskinierror.length == 0) {
  			e.preventDefault();
  			
  			$.ajax({
  				url:'{{ url('Kemaskini') }}/'+idP,
  				method: 'post',
  				data:{
  					option0: op0,
  					option1: op1,
  					option2: op2,
  					option3: op3,
  					option3_1: op3_1,
  					option3_2: op3_2,
  					text1: tx1,
  					num1: num1,
  					num2: num2,
  					num3: num3,
  					num4: num4,
  					num5: num5,
  					num6: num6,
  					date1: date1,
  					date2: date2,
  					fasilitidipohon : KemaskiniFasilitiDipohon,
  					// fasilitimoa : KemaskiniFasilitiMoA,
  				},
  				success: function(data){
  					if (data.alert == 'success') {
  						toastr.success(data.message);
  						if (op3 === 'LainLain') {
  							var newOption = new Option(data.PNama, data.PId, false, false);
  							$('#Kemaskinioption3').append(newOption).trigger('change');
  						}
							// $('#body1').removeAttr('hidden');
							// $("#body2").attr("hidden",true);
  						$('#permohonanTable').DataTable().ajax.reload();
  						clearForm();
  					}else{
   						let errmsg = "";
  						$.each(data.message, function (index, element) {
  							errmsg+="<li>"+element+"</li>";
  						})
   						toastr.error('<ol>'+errmsg+'</ol>');
  					}
  					console.log(data);
  				}
  			});
   		}else{
   			let errmsg = "";
   			let i = 1;
   				$.each(error, function(index, element){
   					errmsg+="<li>"+element+"</li>";
   					i++;
   				})
   			toastr.error('<ol>'+errmsg+'</ol>');
  			console.log(date1, date2);
  			Kemaskinierror = [];
  		}
  	});
	})

	function Kemaskiniclearform1(){
		$("#KemaskinistartDate").val('');
		$("#KemaskiniendDate").val('');
		$("#Kemaskininum1").val('');
		$("#Kemaskininum2").val('');
		$("#Kemaskininum3").val('');
		$("#Kemaskininum4").val('');
		$("#Kemaskininum5").val('');
		$("#Kemaskininum6").val('');
		$("#Kemaskinioption2").val('0');
    $("#Kemaskinioption2").trigger('change');
		// KemaskiniFasilitiMoA =[];
		// $("#Kemaskinilistfasilitimoa").empty();
		// $("#Kemaskinilistfasilitimoa").append('<li> Tiada Data </li>'); ni tak perlu dh
		KemaskiniFasilitiDipohon =[];
		$("#Kemaskinilistfasilitidimohon").empty();
		$("#Kemaskinilistfasilitidimohon").append('<li> Tiada Data </li>');
		console.log('Kemaskiniclearform1()');
	}

	function clearForm(){
		$('#form1').find("input").val("");
    $('#form1').find("select").val('0');
    $('#form1').find("select").trigger('change');
		$("#listfasilitidimohon").empty();
		$("#listfasilitimoa").empty();
		FasilitiDipohon =[];
		// FasilitiMoA=[]; ni tak perlu dh
		console.log('clearForm()');
		$('#body1').removeAttr('hidden');
		$("#body2").attr("hidden",true);
	};
	// function Kemaskinisetclickbtn1(){
	// 	Kemaskiniclickbtn1 = 'yes';
	// };
	function Kemaskinisetclickbtn2(){
		Kemaskiniclickbtn2 = 'yes';
	};

	function KemaskiniaddFasilitiDipohon(data) {
		KemaskiniFasilitiDipohon.push(data);
	}
	// function KemaskiniaddFasilitiMoA(data) {
	// 	KemaskiniFasilitiMoA.push(data);
	// }
	// function Kemaskinibtn1(){
	// 	let opt4 = document.getElementById("Kemaskinioption4").value;
	// 	if(opt4 != "0"){
	// 		if (Kemaskiniclickbtn1 == 'no') {
	// 			Kemaskinisetclickbtn1();
	// 			$("#Kemaskinilistfasilitimoa").empty();
	// 		}
	// 		let data = JSON.parse(opt4);
	// 		let Duplicate = 0;
	// 		$.each(KemaskiniFasilitiMoA, function(index, element){
	// 			if (element.id == data.id) {
	// 				Duplicate = 1;
	// 		    toastr.error('Fasiliti sudah di senaraikan');
	// 			}
	// 		});
	// 		if (Duplicate == 0) {
	// 			KemaskiniaddFasilitiMoA(data);
 //  			$("#Kemaskinilistfasilitimoa").append('<li>'+data.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="Kemaskinideletefasilitimoa('+ data.id +')"></i></li>');
	// 		}
	// 		console.log(Duplicate);
	// 		let jsondata = JSON.stringify(KemaskiniFasilitiMoA);
	// 		console.log(jsondata);
	// 		$("#Kemaskinioption4").val('0');
 //      $("#Kemaskinioption4").trigger('change');
	// 	}else{
	//     toastr.error('Sila pilih fasiliti untuk dimohon');
	// 	}
	// }ni tak perlu dh
	function Kemaskinibtn2(){
		let opt5 = document.getElementById("Kemaskinioption5").value;
		if(opt5 != "0"){
			if (Kemaskiniclickbtn2 == 'no') {
				Kemaskinisetclickbtn2();
				$("#Kemaskinilistfasilitidimohon").empty();
			}
			let data = JSON.parse(opt5);
			let Duplicate = 0;
			$.each(KemaskiniFasilitiDipohon, function(index, element){
				if (element.id == data.id) {
					Duplicate = 1;
			    toastr.error('Fasiliti sudah di senaraikan');
				}
			});
			if (Duplicate == 0) {
				KemaskiniaddFasilitiDipohon(data);
  			$("#Kemaskinilistfasilitidimohon").append('<li>'+data.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="Kemaskinideletefasiliti('+ data.id +')"></i></li>');
			}
			console.log(Duplicate);
			console.log(KemaskiniFasilitiDipohon);
			let jsondata = JSON.stringify(KemaskiniFasilitiDipohon);
			console.log(jsondata);
			// alert(data.Nama);
			$("#Kemaskinioption5").val('0');
      $("#Kemaskinioption5").trigger('change');
		}else{
	    toastr.error('Sila pilih fasiliti untuk dimohon');
		}
	}
	// function Kemaskinideletefasilitimoa(fasiliti) {
	// 	let c = confirm("Anda pasti ?");
	// 	if (c == true){
	// 		KemaskiniFasilitiMoA.splice(KemaskiniFasilitiMoA.findIndex(v => v.id  == fasiliti), 1);
	// 		console.log(KemaskiniFasilitiMoA);
	// 		$("#Kemaskinilistfasilitimoa").empty();

	// 		$.each(KemaskiniFasilitiMoA, function(indexe, element){
	// 			$("#Kemaskinilistfasilitimoa").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="Kemaskinideletefasilitimoa('+ element.id +')"></i></li>');
	// 		});

	// 		if (KemaskiniFasilitiMoA.length === 0) {
	// 			$("#Kemaskinilistfasilitimoa").append('<li> Tiada Data </li>');
	// 			Kemaskiniclickbtn1 = 'no';
	// 		}
	// 	}
	// } ni tak perlu dh
	function Kemaskinideletefasiliti(fasiliti) {
		let c = confirm("Anda pasti ?");
		if (c == true){
			console.log(KemaskiniFasilitiDipohon.findIndex(v => v.id  == fasiliti));
			KemaskiniFasilitiDipohon.splice(KemaskiniFasilitiDipohon.findIndex(v => v.id  == fasiliti), 1);
			$("#Kemaskinilistfasilitidimohon").empty();

			$.each(KemaskiniFasilitiDipohon, function(indexe, element){
				$("#Kemaskinilistfasilitidimohon").append('<li>'+element.Nama+' <i class="fas fa-trash-alt" style="cursor: pointer; color: red;" onclick="Kemaskinideletefasiliti('+ element.id +')"></i></li>');
			});

			if (KemaskiniFasilitiDipohon.length === 0) {
				$("#Kemaskinilistfasilitidimohon").append('<li> Tiada Data </li>');
				Kemaskiniclickbtn2 = 'no';
			}
		}	
	}
</script>
@endsection