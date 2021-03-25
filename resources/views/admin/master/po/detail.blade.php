<input type="hidden" name="id" value="{{ $po->id }}" id="id_data" />
<div class="row mt-1">
    <div class="col-md-4 mt-3">
        <h6><b>ID TRANSAKSI</b></h6>
        <h6>{{ $po->kode }}</h6>
    </div>
    <div class="col-md-4 mt-3">
        <h6><b>TANGGAL PO</b></h6>
        <h6>{{ date('d F Y', strtotime ($po->created_at)) }}</h6>
    </div>
    <div class="col-md-4 mt-3">
        <h6><b>NAMA CUSTOMER</b></h6>
        <h6>{{ $po->customer->nama }}</h6>
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
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($po->lines as $e=> $item)
                    <tr>
                        <td>{{ $e+1 }}</td>
                        <td>{{ $item->nama->nama }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ number_format($item->grand_total,0) }}</td>
                        @if ($item->status == 1)
                        <td><b>{{ $satu }}</b></td>
                        @endif
                        @if ($item->status == 2)
                        <td><b>{{ $dua }}</b></td>
                        @endif
                        @if ($item->status == 3)
                        <td><b>{{ $tiga }}</b></td>
                        @endif
                        @if ($item->status == 4)
                        <td><b>{{ $empat }}</b></td>
                        @endif
                        @if ($item->status == 5)
                        <td><b>{{ $lima }}</b></td>
                        @endif
                        @if ($item->status == 6)
                        <td><b>{{ $enam }}</b></td>
                        @endif
                        @if ($item->status == 7)
                        <td><b>{{ $tujuh }}</b></td>
                        @endif
                        @if ($item->status == 8)
                        <td><b>{{ $delapan }}</b></td>
                        @endif
                    </tr> 
                    @endforeach
                </tbody>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:end;"><b>GRAND TOTAL :</b></td>
                    <td style="text-align:end;"><b>{{ number_format($po->grand_total) }}</b></td>
                </tbody> 
            </table>
        </div>
    </div>
</div>