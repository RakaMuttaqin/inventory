<!-- Modal Tambah Barang -->
<div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="inlineFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title" id="inlineFormLabel">Tambah Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form Tambah Barang -->
            <form method="POST" id="form-validate" action="{{ route('siswa.store') }}" autocomplete="off">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">

                <div class="modal-body">
                    <!-- Input NIS -->
                    <div class="mb-1">
                        <label for="nis" class="form-label">NIS</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="user-check"></i>
                            </span>
                            <input type="text" id="nis" class="form-control" name="nis" required
                                minlength="12" maxlength="15" aria-describedby="nisHelp" placeholder="Masukkan NIS"
                                oninput="validateNumberInput(this)" />
                        </div>
                    </div>

                    <!-- Input Nama Siswa -->
                    <div class="mb-1">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="user"></i>
                            </span>
                            <input type="text" id="nama" class="form-control" name="nama" required
                                minlength="3" aria-describedby="namaHelp" pattern="^[A-Za-z]+$"
                                placeholder="Masukkan Nama Siswa" />
                        </div>
                    </div>

                    <!-- Select Kelas -->
                    <div class="mb-1">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas" id="kelas" class="form-select cursor-pointer" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Nomor HP -->
                    {{-- <div class="mb-1">
                        <label for="siswa_no_hp" class="form-label">Nomor HP</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="phone"></i>
                            </span>
                            <input type="tel" id="siswa_no_hp" class="form-control" name="no_hp" required
                                pattern="08[0-9]{9,12}" aria-describedby="noHpHelp" placeholder="Masukkan Nomor HP" />
                        </div>
                        <small id="noHpHelp" class="form-text text-muted">Format: 08XXXXXXXXXX</small>
                    </div> --}}

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
