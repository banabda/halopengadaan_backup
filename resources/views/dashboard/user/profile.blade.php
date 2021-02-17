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
                              <li class="breadcrumb-item" aria-current="page">Extra</li>
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
                    <div class="flexbox px-20 pt-20">
                      <label class="toggler toggler-danger text-white">
                        <input type="checkbox">
                        <i class="fa fa-heart"></i>
                      </label>
                      <div class="dropdown">
                        <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                          <a class="dropdown-item" href="#"><i class="fa fa-picture-o"></i> Shots</a>
                          <a class="dropdown-item" href="#"><i class="ti-check"></i> Follow</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Block</a>
                        </div>
                      </div>
                    </div>

                    <div class="box-body text-center pb-50">
                      <a href="#">
                        <img class="avatar avatar-xxl avatar-bordered" src="../images/avatar/5.jpg" alt="">
                      </a>
                      <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Roben Parkar</a></h4>
                      <span><i class="fa fa-map-marker w-20"></i> Miami</span>
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                      <li>
                        <span class="opacity-60">Followers</span><br>
                        <span class="font-size-20">8.6K</span>
                      </li>
                      <li>
                        <span class="opacity-60">Following</span><br>
                        <span class="font-size-20">8457</span>
                      </li>
                      <li>
                        <span class="opacity-60">Tweets</span><br>
                        <span class="font-size-20">2154</span>
                      </li>
                    </ul>
                  </div>

                <!-- Profile Image -->
                <div class="box">
                  <div class="box-body box-profile">
                    <div class="row">
                      <div class="col-12">
                          <div>
                              <p>Email :<span class="text-gray pl-10">David@yahoo.com</span> </p>
                              <p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
                              <p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span></p>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="pb-15">
                              <p class="mb-10">Social Profile</p>
                              <div class="user-social-acount">
                                  <button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                                  <button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                  <button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                          <div>
                              <div class="map-box">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>


              <div class="box box-inverse box-carousel slide" data-ride="carousel" style="background-color: #00aced">
                <div class="box-header no-border">
                  <span class="fa fa-twitter font-size-30"></span>
                    <div class="box-tools pull-right">
                      <h5 class="box-title box-title-bold">Carousel feed</h5>
                    </div>
                </div>

                <div class="carousel-inner">
                  <blockquote class="blockquote blockquote-inverse no-border m-0 py-15 carousel-item active">
                    <p>Holisticly benchmark plug imperatives for multifunctional deliverables. Seamlessly incubate cross functional action.</p>
                    <div class="flexbox">
                      <time class="text-white" datetime="2017-11-22 20:00">22 November, 2017</time>
                      <span><i class="fa fa-heart"></i> 62</span>
                    </div>
                  </blockquote>

                  <blockquote class="blockquote blockquote-inverse no-border m-0 py-15 carousel-item">
                    <p>Uniquely revolutionize leveraged catalysts for change for world-class web services. Efficiently underwhelm competitive.</p>
                    <div class="flexbox">
                      <time class="text-white" datetime="2017-11-22 20:00">22 November, 2017</time>
                      <span><i class="fa fa-heart"></i> 45</span>
                    </div>
                  </blockquote>

                  <blockquote class="blockquote blockquote-inverse no-border m-0 py-15 carousel-item">
                    <p>Enthusiastically optimize cross-media manufactured products without process-centric web services. Conveniently.</p>
                    <div class="flexbox">
                      <time class="text-white" datetime="2017-11-22 20:00">22 November, 2017</time>
                      <span><i class="fa fa-heart"></i> 65</span>
                    </div>
                  </blockquote>
                </div>

              </div>

              <div class="box box-inverse" style="background-color: #3b5998">
                <div class="box-header no-border">
                  <span class="fa fa-facebook font-size-30"></span>
                    <div class="box-tools pull-right">
                      <h5 class="box-title box-title-bold">Facebook feed</h5>
                    </div>
                </div>

                <blockquote class="blockquote blockquote-inverse no-border m-0 py-15">
                  <p>Holisticly benchmark plug imperatives for multifunctional deliverables. Seamlessly incubate cross functional action.</p>
                  <div class="flexbox">
                    <time class="text-white" datetime="2017-11-21 20:00">21 November, 2017</time>
                    <span><i class="fa fa-heart"></i> 75</span>
                  </div>
                </blockquote>
              </div>

            </div>
            <div class="col-12 col-lg-7 col-xl-8">

            <div class="nav-tabs-custom box-profile">
              <ul class="nav nav-tabs">
                <li><a class="active" href="#usertimeline" data-toggle="tab">Riwayat</a></li>
                <li><a href="#profile" data-toggle="tab">Profile</a></li>
              </ul>

              <div class="tab-content">

               <div class="active tab-pane" id="usertimeline">

                  <div class="box p-15">
                      <div class="timeline timeline-single-column timeline-single-full-column">

                          <span class="timeline-label">
                              <span class="badge badge-info badge-pill">Images</span>
                          </span>

                          <div class="timeline-item">
                              <div class="timeline-point timeline-point-success">
                                  <i class="fa fa-image"></i>
                              </div>
                              <div class="timeline-event">
                                  <div class="timeline-heading">
                                      <h4 class="timeline-title"><a href="#">Rakesh Kumar</a><small> uploaded new photos</small></h4>
                                  </div>
                                  <div class="timeline-body">
                                      <img src="../images/150x100.png" alt="..." class="m-10">
                                      <img src="../images/150x100.png" alt="..." class="m-10">
                                      <img src="../images/150x100.png" alt="..." class="m-10">
                                      <img src="../images/150x100.png" alt="..." class="m-10">
                                  </div>
                                  <div class="timeline-footer">
                                      <p class="text-right"><i class="fa fa-clock-o"></i> 8 days ago</p>
                                  </div>
                              </div>
                          </div>

                          <div class="timeline-item">
                              <div class="timeline-point timeline-point-info">
                                  <i class="ion ion-chatbubble-working"></i>
                              </div>
                              <div class="timeline-event">
                                  <div class="timeline-heading">
                                      <h4 class="timeline-title"><a href="#">Jone Doe</a><small> commented on your post</small></h4>
                                  </div>
                                  <div class="timeline-body">
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                                  </div>
                                  <div class="timeline-footer">
                                      <a class="btn btn-rounded btn-success btn-sm" href="#">View comment</a>
                                      <p class="pull-right"><i class="fa fa-clock-o"></i> 8 days ago</p>
                                  </div>
                              </div>
                          </div>

                          <div class="timeline-item">
                              <div class="timeline-point timeline-point-danger">
                                  <i class="ion ion-ios-videocam"></i>
                              </div>
                              <div class="timeline-event">
                                  <div class="timeline-heading">
                                      <h4 class="timeline-title"><a href="#">Jone Doe</a><small> shared a video</small></h4>
                                  </div>
                                  <div class="timeline-body">
                                      <div class="embed-responsive embed-responsive-16by9">
                                          <iframe width="854" height="480" src="https://www.youtube.com/embed/k85mRPqvMbE" frameborder="0" allowfullscreen></iframe>
                                      </div>
                                  </div>
                                  <div class="timeline-footer">
                                      <a class="btn btn-rounded btn-success btn-sm" href="#">View comment</a>
                                      <p class="pull-right"><i class="fa fa-clock-o"></i> 8 days ago</p>
                                  </div>
                              </div>
                          </div>

                          <span class="timeline-label">
                              <button class="btn btn-rounded btn-danger"><i class="fa fa-clock-o"></i></button>
                          </span>
                      </div>
                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="profile">

                  <div class="box p-15">
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

@endsection
