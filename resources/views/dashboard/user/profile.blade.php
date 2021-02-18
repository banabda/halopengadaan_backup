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

      <!-- Main content -->
      <section class="content">

        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4">

                <div class="box box-inverse bg-img" style="background-image: url(../images/gallery/full/1.jpg);" data-overlay="2">

                    <div class="box-body text-center pb-50">
                      <a href="#">
                        @if (is_null($user->profile))
                            <img class="avatar avatar-xxl avatar-bordered" src="Lalala" alt="">
                        @elseif(is_null($user->profile->foto))
                            <img class="avatar avatar-xxl avatar-bordered" src="Lalala" alt="">
                        @else
                            <img class="avatar avatar-xxl avatar-bordered" src="{{ Storage::url($user->profile->foto) }}" alt="">
                        @endif
                      </a>
                      <h4 class="mt-3 mb-0"><a class="hover-primary text-white" href="#">{{ $user->name }}</a></h4>
                      {{-- <span><i class="fa fa-map-marker w-20"></i> Miami</span> --}}
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                      <li>
                        <span class="opacity-60">Status Account</span><br>
                        <span class="font-size-20">Active</span>
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
                            <label for="inputExperience" class="col-sm-2 control-label pt-1">Alamat Rumah</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" name="alamat_rumah" placeholder="Alamat Lengkap"></textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 control-label pt-1">Alamat Kerja</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" name="alamat_kerja" placeholder="Alamat Tempat Kerja / Bisnis"></textarea>
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
                                <input type="text" class="form-control" id="inputName" name="nama_lengkap" value="{{ Auth::user()->name }}" placeholder="Nama Lengkap">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 control-label pt-1">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" name="email" value="{{ Auth::user()->email }}" placeholder="Email Aktif">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 control-label pt-1">Nomor HP</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPhone" name="no_hp" value="{{ $user->profile->no_hp }}" placeholder="Terhubung dengan WhatsApp (6285683xxx)">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 control-label pt-1">Alamat Rumah</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" name="alamat_rumah" placeholder="Alamat Lengkap">{{ $user->profile->alamat_rumah }}</textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 control-label pt-1">Alamat Kerja</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" name="alamat_kerja" placeholder="Alamat Tempat Kerja / Bisnis">{{ $user->profile->alamat_kerja }}</textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kerja" class="col-sm-2 control-label pt-2">Jenis Kerja</label>

                                <div class="col-sm-10">
                                <select name="jenis_kerja" id="jenis_kerja" class="form-control">
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
                                <select name="status" id="status" class="form-control">
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
<script>

</script>

@endsection
