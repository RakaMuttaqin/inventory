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
            <form method="POST" id="form-validate" action="{{ route('daftar-barang.store') }}" autocomplete="off">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">

                <div class="modal-body">
                    <!-- Input Nama Barang -->
                    <div class="mb-1">
                        <label for="br_nama" class="form-label">Nama Barang</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="box"></i>
                            </span>
                            <input type="text" id="br_nama" class="form-control" name="br_nama" required
                                minlength="3" aria-describedby="namaHelp" placeholder="Nama Barang" />
                        </div>
                    </div>

                    <div class="mb-1">
                        <label for="jns_brg_kode" class="form-label">Jenis Barang</label>
                        <select name="jns_brg_kode" id="br_jenis" class="form-select cursor-pointer" required>
                            <option value="" disabled selected>Pilih Jenis Barang</option>
                            @foreach ($jenisBarang as $jb)
                                <option value="{{ $jb->jns_brg_kode }}">{{ $jb->jns_brg_nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Tanggal Terima -->
                    <div class="mb-1">
                        <label for="br_tgl_terima" class="form-label">Tanggal Terima</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="calendar"></i>
                            </span>
                            <input type="date" id="br_tgl_terima" class="form-control flatpickr-human-friendly"
                                name="br_tgl_terima" placeholder="October 10, 2021" required />
                        </div>
                    </div>

                    <!-- Select Status -->
                    <div class="mb-1">
                        <label for="br_status" class="form-label">Status</label>
                        <select name="br_status" id="br_status" class="form-select cursor-pointer">
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
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
