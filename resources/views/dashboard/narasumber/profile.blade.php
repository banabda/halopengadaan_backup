@extends('dashboard.dashboard')
@section('content')

<script src="{{ asset('tinymce/js/tinymce.min.js') }}"></script>

<script>
    tinymce.init({
        selector: 'textarea.editor',  // change this value according to your HTML
        plugins: 'lists,table,textcolor',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    });
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Profile Narasumber</h3>
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
      @if (is_null($user->profileNarasumber))
      <div class="px-30 my-15 no-print">
        <div class="callout callout-danger" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
          Lengkapi bagian profil terlebih dahulu !
        </div>
      </div>
      @elseif(is_null($user->profileNarasumber->name) && is_null($user->profileNarasumber->email) && is_null($user->profileNarasumber->no_hp))
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
                        @if (is_null($user->profileNarasumber))
                            <img class="avatar avatar-xxl avatar-bordered" src="https://avatars.dicebear.com/4.5/api/initials/{{ Auth::user()->name }}.svg" alt="">
                        @elseif(is_null($user->profileNarasumber->foto))
                            <img class="avatar avatar-xxl avatar-bordered" src="https://avatars.dicebear.com/4.5/api/initials/{{ Auth::user()->name }}.svg" alt="">
                        @else
                            <img class="avatar avatar-xxl avatar-bordered" src="{{ Storage::url($user->profile->foto) }}" alt="">
                        @endif
                      </a>
                      <h4 class="mt-3 mb-0"><a class="hover-primary text-white" href="#">{{ Auth::user()->name }}</a></h4>
                      {{-- <span><i class="fa fa-map-marker w-20"></i> Miami</span> --}}
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                      <li>
                        {{-- <span class="opacity-60">Status Akun</span><br> --}}
                        {{-- @if (is_null($user->profile))
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
                        @endif --}}
                        {{-- <span class="font-size-20">Active</span> --}}
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
                      @if (is_null($user->profileNarasumber))
                        <form class="form-horizontal form-element col-12 pt-4" action="{{ route('narasumber.dashboard.profile.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 control-label pt-1">Nama Lengkap</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="{{ Auth::user()->name }}" name="name"  placeholder="Nama Lengkap">
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
                                <label for="upload_cv" class="col-sm-2 control-label pt-1">Upload CV</label>
                                <div class="col-sm-10">
                                    <input type="file" id="upload_cv" name="cv" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="jenis_kerja" class="col-sm-2 control-label pt-2">Keahlian Utama</label>

                                <div class="col-sm-10">
                                    <div class="demo-checkbox">
                                        @foreach ($bidang as $item)
                                            <input type="checkbox" id="keahlianutama-{{ $item->id }}" value="{{ $item->id }}" name="keahlian_utama[]" class="filled-in chk-col-primary keahlian-utama"/>
                                            <label for="keahlianutama-{{ $item->id }}">{{ $item->name }}</label>
                                        @endforeach
                                    </div>
                                    {{-- <textarea name="keahlian_utama" class="form-control editor" rows="8" placeholder="Keahlian Utama"></textarea> --}}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="jenis_kerja" class="col-sm-2 control-label pt-2">Keahlian Pendukung</label>
                                <div class="col-sm-10">
                                    <div class="demo-checkbox">
                                        @foreach ($bidang as $item)
                                            <input type="checkbox" id="keahlianpendukung-{{ $item->id }}" value="{{ $item->id }}" name="keahlian_pendukung[]" class="filled-in chk-col-primary keahlian-pendukung"/>
                                            <label for="keahlianpendukung-{{ $item->id }}">{{ $item->name }}</label>
                                        @endforeach
                                    </div>
                                    {{-- <textarea name="keahlian_pendukung" class="form-control editor" rows="8" placeholder="Keahlian Pendukung"></textarea> --}}
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
                        <form class="form-horizontal form-element col-12 pt-4" action="{{ route('narasumber.dashboard.profile.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->profileNarasumber->user_id }}">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 control-label pt-1">Nama Lengkap</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="{{ Auth::user()->name }}" name="name"  placeholder="Nama Lengkap">
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
                                    <input type="text" class="form-control" id="inputPhone" name="no_hp" value="{{ $user->profileNarasumber->no_hp }}" placeholder="Terhubung dengan WhatsApp (6285683xxx)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_cv" class="col-sm-2 control-label pt-1">Upload CV</label>
                                <div class="col-sm-10">
                                    <input type="file" id="upload_cv" name="cv">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="jenis_kerja" class="col-sm-2 control-label pt-2">Keahlian Utama</label>

                                <div class="col-sm-10">
                                    <div class="demo-checkbox">
                                        @foreach ($bidang as $item)
                                            <input type="checkbox" id="keahlianutama-{{ $item->id }}" value="{{ $item->id }}" name="keahlian_utama[]" class="filled-in chk-col-primary keahlian-utama"
                                            @foreach ($keahlian_utama as $ku)
                                            @if ($ku->bidang_id == $item->id)
                                                checked
                                            @endif
                                            @endforeach
                                            />
                                            <label for="keahlianutama-{{ $item->id }}">{{ $item->name }}</label>
                                        @endforeach
                                    </div>
                                    {{-- <textarea name="keahlian_utama" class="form-control editor" rows="8" placeholder="Keahlian Utama">{{ $user->profileNarasumber->keahlian_utama }}</textarea> --}}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="jenis_kerja" class="col-sm-2 control-label pt-2">Keahlian Pendukung</label>
                                <div class="col-sm-10">
                                    <div class="demo-checkbox">
                                        @foreach ($bidang as $item)
                                        <input type="checkbox" id="keahlianpendukung-{{ $item->id }}" value="{{ $item->id }}" name="keahlian_pendukung[]" class="filled-in chk-col-primary"
                                            @foreach ($keahlian_pendukung as $kp)
                                            @if ($kp->bidang_id == $item->id)
                                                checked
                                            @endif
                                            @endforeach
                                            />
                                            <label for="keahlianpendukung-{{ $item->id }}" >{{ $item->name }}</label>
                                        @endforeach
                                    </div>
                                    {{-- <textarea name="keahlian_pendukung" class="form-control editor" rows="8" placeholder="Keahlian Pendukung">{{ $user->profileNarasumber->keahlian_pendukung }}</textarea> --}}
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

    $(document).on('click', '.keahlian-utama', function(){
        var keahlian_utama = $(this).attr("id");
        var id = keahlian_utama.replace("keahlianutama-", "");

        var selector = "#"+keahlian_utama+"";

        if ($(selector).is(':checked')) {
            $("#keahlianpendukung-"+ id +"").prop("disabled", true);
        } else {
            $("#keahlianpendukung-"+ id +"").prop("disabled", false);
        }

    });

</script>
<script>

</script>

@endsection
