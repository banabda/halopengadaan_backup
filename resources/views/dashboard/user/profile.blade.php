@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Profile</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Profile</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
      @if (is_null($user->profile))
        <div class="px-30 my-15 no-print">
            <div class="callout callout-danger" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            Lengkapi bagian profil terlebih dahulu !
            </div>
        </div>
      @elseif(is_null($user->profile->nama_lengkap) && is_null($user->profile->email) && is_null($user->profile->no_hp))
        <div class="px-30 my-15 no-print">
            <div class="callout callout-danger" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            Lengkapi bagian profil terlebih dahulu !
            </div>
        </div>
      @else

      @endif


      <!-- Main content -->
      <section class="content">

        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4">

                <div class="box box-inverse bg-img" style="background-image: url(../images/gallery/full/1.jpg);" data-overlay="2">

                    <div class="box-body text-center pb-50">
                      <a href="#">
                        @if (is_null($user->profile))
                            <img class="avatar avatar-xxl avatar-bordered" src="https://avatars.dicebear.com/4.5/api/initials/{{ Auth::user()->name }}.svg" alt="">
                        @elseif(is_null($user->profile->foto))
                            <img class="avatar avatar-xxl avatar-bordered" src="https://avatars.dicebear.com/4.5/api/initials/{{ Auth::user()->name }}.svg" alt="">
                        @else
                            <img class="avatar avatar-xxl avatar-bordered" src="{{ Storage::url($user->profile->foto) }}" alt="">
                        @endif
                      </a>
                      <h4 class="mt-3 mb-0"><a class="hover-primary text-white" href="#">{{ $user->name }}</a></h4>
                      {{-- <span><i class="fa fa-map-marker w-20"></i> Miami</span> --}}
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                      <li>
                        <span class="opacity-60">Status Akun</span><br>
                        @if (is_null($user->profile))
                            <span class="font-size-20">Belum Aktif</span>
                        @elseif(!is_null($user->profile))
                            <span class="font-size-20">Profile Update</span>
                        @elseif(is_null($user->userHasPaket))
                            <span class="font-size-20">Belum Ada Paket</span>
                        @elseif(!is_null($user->userHasPaket))
                            @if ($user->userHasPaket->paket == "1")
                                <span class="font-size-20">Paket Silver</span>
                            @elseif($user->userHasPaket->paket == "2")
                                <span class="font-size-20">Paket Gold</span>
                            @else
                                <span class="font-size-20">Paket Platinum</span>
                            @endif
                        @endif
                        
                      </li>
                    </ul>
                  </div>

                <!-- Profile Image -->
                <div class="box">
                  <div class="box-body box-profile">
                    <form action="{{ route('profile.upload.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
						<label class="col-form-label col-lg-2">Foto</label>
						<div class="col-lg-10">
							<input type="file" id="uploadFoto" name="foto" class="form-control">
						</div>
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <img id="foto_profile" width="50%" height="auto" />
                    <br>
                    <button type="submit" class="btn btn-rounded btn-success mt-2">Submit</button>
                    </form>

                  </div>
                  <!-- /.box-body -->
                </div>

            </div>
            <div class="col-12 col-lg-7 col-xl-8">

            <div class="nav-tabs-custom box-profile">
              <ul class="nav nav-tabs">
                <li><a class="active" href="#profile" data-toggle="tab">Profile</a></li>
              </ul>

              <div class="tab-content">

                <div class="active tab-pane" id="profile">
                  <div class="box p-15">
                      @if (is_null($user->profile))
                        <form class="form-horizontal form-element col-12 pt-4" action="{{ route('profile.save') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="is_complete" value="1">
                            <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label pt-1">Nama Lengkap</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" value="{{ Auth::user()->name }}" name="nama_lengkap"  placeholder="Nama Lengkap">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 control-label pt-1">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" value="{{ Auth::user()->email }}" name="email" placeholder="Email Aktif">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 control-label pt-1">Nomor HP</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPhone" name="no_hp" placeholder="Terhubung dengan WhatsApp (6285683xxx)">
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kerja" class="col-sm-2 control-label pt-2">Jenis Kerja</label>

                                <div class="col-sm-10">
                                <select name="jenis_kerja" id="jenis_kerja" class="form-control">
                                    <option>Jenis Kerja</option>
                                    <option value="PNS">PNS</option>
                                    <option value="BUMN" >BUMN</option>
                                    <option value="BUMD" >BUMD</option>
                                    <option value="BLU" >BLU</option>
                                    <option value="BLUD" >BLUD</option>
                                    <option value="Perusahaan" >Perusahaan</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 control-label pt-2">Status</label>

                                <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option>Pilih Status</option>
                                    <option value="Penyedia" >Penyedia</option>
                                    <option value="Pengguna" >Pengguna</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="ml-auto col-sm-10">
                                <div class="checkbox">
                                <input type="checkbox" id="basic_checkbox_1" checked="">
                                <label for="basic_checkbox_1"> I agree to the</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="ml-auto col-sm-10">
                                <button type="submit" class="btn btn-rounded btn-success">Submit</button>
                            </div>
                            </div>
                        </form>
                      @else
                        <form class="form-horizontal form-element col-12 pt-4" action="{{ route('profile.save') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="is_complete" value="1">
                            <div class="form-group row">
                            <label for="inputName" class="col-sm-2 control-label pt-1">Nama Lengkap</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name="nama_lengkap" value="{{ Auth::user()->name }}" placeholder="Nama Lengkap" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 control-label pt-1">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" name="email" value="{{ Auth::user()->email }}" placeholder="Email Aktif" disabled>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 control-label pt-1">Nomor HP</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPhone" name="no_hp" value="{{ $user->profile->no_hp }}" placeholder="Terhubung dengan WhatsApp (6285683xxx)" required>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kerja" class="col-sm-2 control-label pt-2">Jenis Kerja</label>
                                <div class="col-sm-10">
                                <select name="jenis_kerja" id="jenis_kerja" class="form-control" required>
                                    <option>Jenis Kerja</option>
                                    <option value="PNS" {{ ($user->profile->jenis_kerja == "PNS") ? 'selected' : '' }}>PNS</option>
                                    <option value="BUMN"  {{ ($user->profile->jenis_kerja == "BUMN") ? 'selected' : '' }}>BUMN</option>
                                    <option value="BUMD"  {{ ($user->profile->jenis_kerja == "BUMD") ? 'selected' : '' }}>BUMD</option>
                                    <option value="BLU"  {{ ($user->profile->jenis_kerja == "BLU") ? 'selected' : '' }}>BLU</option>
                                    <option value="BLUD"  {{ ($user->profile->jenis_kerja == "BLUD") ? 'selected' : '' }}>BLUD</option>
                                    <option value="Perusahaan"  {{ ($user->profile->jenis_kerja == "Perusahaan") ? 'selected' : '' }}>Perusahaan</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 control-label pt-2">Status</label>

                                <div class="col-sm-10">
                                <select name="status" id="status" class="form-control" required>
                                    <option>Pilih Status</option>
                                    <option value="Penyedia" {{ ($user->profile->status == "Penyedia") ? 'selected' : '' }}>Penyedia</option>
                                    <option value="Pengguna" {{ ($user->profile->status == "Pengguna") ? 'selected' : '' }}>Pengguna</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="ml-auto col-sm-10">
                                <div class="checkbox">
                                <input type="checkbox" id="basic_checkbox_1" checked="">
                                <label for="basic_checkbox_1"> I agree to the</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="ml-auto col-sm-10">
                                <button type="submit" class="btn btn-rounded btn-success">Submit</button>
                            </div>
                            </div>
                        </form>
                      @endif

                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        if(sessionStorage.getItem('popState') != 'shown'){
        sessionStorage.setItem('popState','shown')
        $('#modalPendaftaran').modal('show');
    }
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#foto_profile').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#uploadFoto").change(function() {
        readURL(this);
    });
</script>

  <!-- Modal -->
<div class="modal center-modal fade bs-example-modal-lg" id="modalPendaftaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> --}}
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/panduan-user-dashboard.svg') }}" alt="tata-pendaftaran" srcset="">
                {{-- panduan-user-dashboard.svg --}}
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-rounded text-left" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
