<!-- Modal Tambah Barang -->
<div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="inlineFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title" id="inlineFormLabel">Tambah Peminjaman</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form Tambah Barang -->
            <form method="POST" id="form-validate" action="{{ route('peminjaman-barang.store') }}" autocomplete="off"
                novalidate>
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <div class="modal-body">
                    <!-- Pilihan Siswa -->
                    <div class="mb-1">
                        <label for="siswa" class="form-label">Siswa</label>
                        <select name="siswa" id="siswa" class="form-select cursor-pointer" required>
                            <option value="" disabled selected>Pilih Siswa</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Barang Dipinjam -->
                    <div class="mb-1">
                        <label for="data_pinjam" class="form-label">Barang Dipinjam</label>
                        <input type="text" id="search-barang" class="form-control mb-1" placeholder="Cari Barang..."
                            oninput="filterBarang()">
                        <select name="data_pinjam[]" id="data_pinjam" class="form-select cursor-pointer" required
                            multiple>
                            @foreach ($barang as $b)
                                <option value="{{ $b->br_kode }}">{{ $b->br_nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Tanggal Harus Kembali -->
                    <div class="mb-1">
                        <label for="pb_harus_kembali_tgl" class="form-label">Tanggal Harus Kembali</label>
                        <div class="input-group">
                            <input type="datetime-local" id="pb_harus_kembali_tgl" class="form-control"
                                name="pb_harus_kembali_tgl" required />
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

{{-- Modal Detail --}}
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Peminjaman</h5>
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">Kode Peminjaman</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text" id="detail-kode"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">Penganggungjawab</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text" id="detail-penganggungjawab"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">Siswa</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text" id="detail-siswa"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">Barang Dipinjam</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text" id="detail-barang"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">Tanggal Peminjaman</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text" id="detail-tgl"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">Tanggal Harus Kembali</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text" id="detail-harus-kembali"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">Status</p>
                            </div>
                            <div class="col-8">
                                <p class="card-text" id="detail-stat"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
