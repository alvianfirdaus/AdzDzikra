@foreach ($pembayarans as $pembayaran)
    <div class="modal fade" id="uploadPerssek{{ $pembayaran->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Uang Personal Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                  
                    <form method="POST" action="{{ route('pembayaran.updatebktperssek', $pembayaran->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input id="pendaftar_id" type="hidden" class="form-control" name="pendaftar_id"
                            value="{{ old('pendaftar_id', $pembayaran->pendaftar_id) }}" required autofocus>

                        <div class="form-group">
                                <img src="/ppdb/3.png" alt="" width="465px" height="550px">
                        </div>

                        <div class="form-group">
                            <label for="bkt_perssek">{{ __('bkt_perssek') }}</label>
                            <input id="bkt_perssek" type="file" class="form-control" name="bkt_perssek"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Upload Bukti Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
