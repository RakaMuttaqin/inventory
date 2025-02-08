<!-- Modal Tambah Jenis Barang -->
<div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="modalForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title" id="modalForm">Tambah Jenis Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form Tambah Jenis Barang -->
            <form method="POST" class="form-validate" action="{{ route('jenis-barang.store') }}" autocomplete="off">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <div class="modal-body">
                    <!-- Input Nama Jenis Barang -->
                    <div class="mb-1">
                        <label for="jns_brg_nama" class="form-label">Nama Jenis Barang</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i data-feather="box"></i>
                            </span>
                            <input type="text" id="jns_brg_nama" class="form-control" name="jns_brg_nama" required
                                minlength="3" />
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
