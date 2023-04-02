@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <table class="body-wrap"
                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;"
                    bgcolor="#f6f6f6">
                    <tr
                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                            valign="top"></td>
                        <td class="container" width="600"
                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                            valign="top">
                            <div class="content"
                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0"
                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px;  margin: 0; border: none;">
                                    <tr
                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-wrap aligncenter"
                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block; margin: 0;padding: 20px;border: 3px solid #71B6F9;border-radius: 7px; background-color: #fff;"
                                            valign="top">
                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <tr
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block"
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                        valign="top">
                                                        <h2 class="aligncenter"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif; box-sizing: border-box; font-size: 22px; color: #000; line-height: 1.2em; font-weight: 400; text-align: center; margin: 10px 0 0;"
                                                            align="center">
                                                            <a href="#" style="display: block;margin-bottom: 20px;">
                                                                <img src="{{ logoUrl() }}" height="20"
                                                                    alt="logo" /></a>
                                                            Tagihan Perlu Dibayar
                                                        </h2>
                                                    </td>
                                                </tr>
                                                <tr
                                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block aligncenter"
                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 10px;"
                                                        align="center" valign="top">
                                                        <table class="invoice"
                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;"
                                                                    valign="top">{{ env('APP_NAME') }}<br
                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />Invoice
                                                                    #{{ $trx }}
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;"
                                                                    valign="top">
                                                                    <table class="invoice-items" cellpadding="0"
                                                                        cellspacing="0"
                                                                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                                                                        <tr
                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                valign="top">
                                                                                {{ $details['item'] }}
                                                                            </td>
                                                                            <td class="alignright"
                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                align="right" valign="top">
                                                                                {{ number_format($details['harga_awal'], 0, ',', '.') }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr
                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                valign="top">Disc (%)
                                                                            </td>
                                                                            <td class="alignright"
                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;"
                                                                                align="right" valign="top">
                                                                                {{ $details['disc'] }}%
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="total"
                                                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td class="alignright" width="80%"
                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;"
                                                                                align="right" valign="top">Total
                                                                            </td>
                                                                            <td class="alignright"
                                                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;"
                                                                                align="right" valign="top">
                                                                                {{ number_format($details['total'], 0, ',', '.') }}
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <div
                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">

                                </div>
                            </div>
                        </td>
                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                            valign="top"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-box">
                <h2>No Rekening Pembayaran</h2>
                <hr>
                <h5>BCA 7670371195 </h5>
                <h5>BRI 477901004193535</h5>
                <h5>Mandiri 1750001122802</h5>
                <hr>
                @if ($inv->status == 1)
                    <label class=" col-form-label">Upload Bukti Transfer</label>
                    <div class="text-center">
                        <form action="" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="file" name="bukti" class="dropify" data-default-file="" />
                            <input type="hidden" name="trx" id="" value="{{ $trx }}">
                            <button type="submit" class="btn btn-success mt-3 "><i class="fas fa-save"></i>
                                Upload</button>
                        </form>
                    </div>
                @elseif(auth()->user()->id == 1 && $inv->status == 2)
                    <label class=" col-form-label">Validasi Bukti Transfer</label>
                    <div class="text-center">
                        <form action="" enctype="multipart/form-data" method="post">
                            @csrf
                            <img src="{{ asset($inv->bukti) }}" alt="" style="max-width:30rem">
                            <br>
                            <br>
                            <input type="hidden" name="trx" id="" value="{{ $trx }}">
                            <input type="submit" name="status" id="" value="Valid"
                                class="btn btn-success mr-1">
                            <input type="submit" name="status" id="" value="Invalid"
                                class="btn btn-danger ml-1">
                        </form>
                    </div>
                @else
                    <div class="text-center">
                        <a href="" class="text-info"><i class="mdi mdi-spin mdi-loading mr-1"></i>
                            {{ stsBayar($inv->status) }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
