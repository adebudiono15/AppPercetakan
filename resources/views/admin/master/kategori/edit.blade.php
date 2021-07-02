    <input type="hidden" name="id" value="{{ $kategori->id }}" id="id_data" />
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="nama" @error('nama') class="text-danger" @enderror>KODE KATEGORI @error('nama')
                    | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control form-control-sm shadow" value="{{ $kategori->kode }}"
                    name="nama" style="height: 28px;" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="nama" @error('nama') class="text-danger" @enderror>NAMA @error('nama')
                    | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control form-control-sm shadow" value="{{ $kategori->nama }}"
                    name="nama" style="height: 28px;">
            </div>
        </div>
    </div>