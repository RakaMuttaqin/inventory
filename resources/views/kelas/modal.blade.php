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
            <form method="POST" id="form-validate" action="{{ route('kelas.store') }}" autocomplete="off">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">

                <div class="modal-body">
                    <!-- Input NIS -->
                    <div class="mb-1">
                        <label for="kelas" class="form-label">Kelas</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="book-open"></i>
                            </span>
                            <input type="text" id="kelas" class="form-control" name="nama" required
                                minlength="3" maxlength="15" placeholder="Masukkan Kelas" />
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
