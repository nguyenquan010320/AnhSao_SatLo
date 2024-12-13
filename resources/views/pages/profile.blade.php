@extends('../layout')
@section('style')
    <style>
        .mb-10 {
            margin-bottom: 10px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 16px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
@endsection
@section('content')
    <div id="content">
        <div class="profile__container">
            <div class="container rounded bg-white mt-5 mb-5">
                <form action="{{route('update-info')}}" id="form-profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Avatar Section -->
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img id="avatar-preview" class="rounded-circle mt-5" width="150px"
                                    src="{{  Auth::user()->image ?? asset('img/avt.jpg') }}"
                                    alt="Avatar">
                                <a  id="edit-avatar-btn" class="btn btn-outline-primary btn-sm mt-3">Sửa
                                    avatar</a>
                                <input type="file" name="image" id="avatar-input" class="form-control mt-2 d-none" accept="image/*">
                                <span class="font-weight-bold mt-2">{{Auth::user()->name_en}}</span>
                                <span class="text-black-50">{{Auth::user()->email}}</span>
                            </div>
                        </div>
                        <!-- Avatar Section -->
 
                        <!-- User Info Section -->
                        <div class="col-md-9 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Thông tin cá nhân</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label class="labels">Họ và tên</label>
                                        <input type="text" name="name_en" class="form-control" placeholder="Họ và tên" value="{{old('name_en')}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="labels">Số điện thoại</label>
                                        <input type="number" name="contact_en" class="form-control" placeholder="Số điện thoại"
                                            value="{{old('contact_en')}}" required>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Mật khẩu hiện tại</label>
                                        <input type="password" name="pass_old" class="form-control" placeholder="Mật khẩu" value="{{old('pass_old')}}" required>
                                        @error('pass_old')
                                        <div class="text-red-500 text-sm notification__erro">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Mật khẩu mới</label>
                                        <input type="password" name="pass_new" class="form-control" placeholder="Mật khẩu" value="{{old('pass_new')}}" required>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Nhập lại mật khẩu</label>
                                        <input type="password" name="pass_new_reenter" class="form-control" placeholder="Mật khẩu" value="{{old('pass_new_reenter')}}" required>
                                        @error('pass_new_reenter')
                                        <div class="text-red-500 text-sm notification__erro">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="mt-4 text-center mb-10">
                                    <input class="btn btn-primary profile-button" type="submit" value="Cập nhật">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const avatarInput = document.getElementById('avatar-input');
        const avatarPreview = document.getElementById('avatar-preview');
        const editAvatarBtn = document.getElementById('edit-avatar-btn');
        // const formdata = document.getElementById('form-profile');

        // Khi bấm vào nút "Sửa avatar"
        editAvatarBtn.addEventListener('click', () => {
            avatarInput.click(); // Kích hoạt input file
        });

        // Hiển thị ảnh ngay khi chọn
        avatarInput.addEventListener('change', function(event) {

            var file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
