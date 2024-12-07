@extends('../layout')
@section('style')
    <style>
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
            font-size: 11px
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
                <div class="row">
                    <!-- Avatar Section -->
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img id="avatar-preview" class="rounded-circle mt-5" width="150px"
                                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                                alt="Avatar">
                            <button id="edit-avatar-btn" class="btn btn-outline-primary btn-sm mt-3">Sửa
                                avatar</button>
                            <input type="file" id="avatar-input" class="form-control mt-2 d-none" accept="image/*">
                            <span class="font-weight-bold mt-2">AdminWeb</span>
                            <span class="text-black-50">adminweb@mail.com.my</span>
                        </div>
                    </div>

                    <!-- User Info Section -->
                    <div class="col-md-9 border-right">
                        <form action="">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Thông tin cá nhân</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label class="labels">Họ</label>
                                        <input type="text" class="form-control" placeholder="Họ" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="labels">Tên</label>
                                        <input type="text" class="form-control" placeholder="Tên" value="">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Số điện thoại</label>
                                        <input type="text" class="form-control" placeholder="Số điện thoại"
                                            value="">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">Email</label>
                                        <input type="text" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">Mật khẩu</label>
                                        <input type="password" class="form-control" placeholder="Mật khẩu" value="">
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="button">Lưu hồ sơ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <script>
        const avatarInput = document.getElementById('avatar-input');
        const avatarPreview = document.getElementById('avatar-preview');
        const editAvatarBtn = document.getElementById('edit-avatar-btn');

        // Khi bấm vào nút "Sửa avatar"
        editAvatarBtn.addEventListener('click', () => {
            avatarInput.click(); // Kích hoạt input file
        });

        // Hiển thị ảnh ngay khi chọn
        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
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
