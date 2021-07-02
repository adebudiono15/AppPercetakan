<input type="hidden" name="id" value="{{ $logistik_masuk->id }}" id="id_data" />
<div class="row mt-1">
    <div class="col-md-4 mt-3">
        <h6><b>ID TRANSAKSI</b></h6>
        <h6>{{ $logistik_masuk->kode }}</h6>
    </div>
    <div class="col-md-4 mt-3">
        <h6><b>TANGGAL TRANSAKSI</b></h6>
        <h6>{{ date('d F Y', strtotime ($logistik_masuk->created_at)) }}</h6>
    </div>
    <div class="col-md-4 mt-3">
        <h6><b>NAMA SUPPLIER</b></h6>
        <h6>{{ $logistik_masuk->supplier->nama }}</h6>
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-12 mt-3">
        <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
                <thead>
                    <tr class="bg-dark text-white">
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>QTY</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logistik_masuk->lines as $e=> $item)
                    <tr>
                        <td>{{ $e+1 }}</td>
                        <td>{{ $item->nama->nama }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ number_format($item->grand_total,0) }}</td>
                    </tr> 
                    @endforeach
                </tbody>
                <tbody>
                    <td></td>
                    <td></td>
                    <td style="text-align:end;"><b>GRAND TOTAL :</b></td>
                    <td style="text-align:end;"><b>{{ number_format($logistik_masuk->grand_total) }}</b></td>
                </tbody> 
            </table>
        </div>
    </div>
</div>