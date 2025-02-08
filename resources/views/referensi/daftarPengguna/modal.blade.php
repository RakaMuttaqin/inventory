<!-- Modal Tambah Pengguna -->
<div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="modalForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title" id="modalForm">Tambah Pengguna</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form Tambah Pengguna -->
            <form method="POST" id="form-validate" action="{{ route('daftar-pengguna.store') }}">
                @csrf
                @method('POST')
                <input type="hidden" id="formMethod" name="_method" value="POST">

                <div class="modal-body">
                    <!-- Input Nama Pengguna -->
                    <div class="form-group mb-1">
                        <label for="user_nama" class="form-label">Nama Pengguna</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="user"></i>
                            </span>
                            <input type="text" id="user_nama" class="form-control" name="user_nama"
                                placeholder="johndoe" pattern="^[a-z]+$" required
                                oninput="validateLowercaseInput(this)" />
                        </div>
                    </div>

                    <!-- Input Hak Akses -->
                    <div class="form-group mb-1">
                        <label for="user_hak" class="form-label">Hak Akses</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="shield"></i>
                            </span>
                            <input type="text" id="user_hak" class="form-control" name="user_hak" placeholder="Role"
                                pattern="^[A-z]+$" oninput="validateLetterInput(this)" required />
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div class="form-group mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="user_pass">Password</label>
                        </div>
                        <div class="input-group form-password-toggle">
                            <input type="password" id="user_pass" class="form-control" name="user_pass"
                                placeholder="Password" required minlength="6" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                    </div>

                    <!-- Select Status -->
                    <div class="form-group mb-1">
                        <label for="user_sts" class="form-label">Status</label>
                        <div class="input-group">
                            <select name="user_sts" id="user_sts" class="form-select cursor-pointer">
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
