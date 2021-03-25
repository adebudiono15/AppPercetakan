    <input type="hidden" name="id" value="{{ $barang->id }}" id="id_data" />
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="nama" @error('nama') class="text-danger" @enderror>KODE BARANG @error('nama')
                    | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control form-control-sm shadow" value="{{ $barang->kode }}" style="height: 28px;" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="nama" @error('nama') class="text-danger" @enderror>NAMA @error('nama')
                    | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control form-control-sm shadow" value="{{ $barang->nama }}"
                    name="nama" style="height: 28px;">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="stok" @error('stok') class="text-danger" @enderror>KATEGORI @error('stok')
                    | {{ $message }}
                    @enderror</label>
                    <select id="kategori" name="kategori" class="js-states form-control" style="width: 100%">
                        <option value="{{ $barang->kategori_id }}">{{ $barang->kategori->nama }}</option>
                       @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                       @endforeach
                    </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="stok" @error('stok') class="text-danger" @enderror>STOK @error('stok')
                    | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control form-control-sm shadow" value="{{ $barang->stok }}"
                name="stok" style="height: 28px;">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="harga_beli" @error('harga_beli') class="text-danger" @enderror>HARGA BELI @error('harga_beli')
                    | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control form-control-sm shadow" value="{{ $barang->harga_beli }}"
                name="harga_beli" style="height: 28px;">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="harga_jual" @error('harga_jual') class="text-danger" @enderror>HARGA JUAL @error('harga_jual')
                    | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control form-control-sm shadow" value="{{ $barang->harga_jual }}"
                name="harga_jual" style="height: 28px;">
            </div>
        </div>
    </div>

    <script>
        $("#kategori").select2({
           allowClear: true
       });
   </script>