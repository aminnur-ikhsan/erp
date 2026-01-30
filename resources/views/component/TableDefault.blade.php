@php
   $headTexts = $headTitle ?? ['col-1', 'col-2', 'col-3', 'col-4'];
   $bodyDatas = $dataTable ?? [];
   $dataKey = $dataKey ?? [];
   $checkbox = $checkbox ?? false;
   $numbering = $numbering ?? false;
@endphp

{{-- Table Start --}}
<table class="table table-hover">
   <thead>
      <tr>
         @if ($numbering)
            <th scope="col">No.</th>
         @endif
         @if ($checkbox)
            <th scope="col">
               <div class="d-flex justify-content-center align-items-center">
                  <input class="form-check-input" type="checkbox">
               </div>
            </th>
         @endif
         @foreach ($headTexts as $text)
            <th scope="col">{{ $text }}</th>
         @endforeach
      </tr>
   </thead>
   <tbody style="font-size: 14px !important;">
      @if (count($bodyDatas) > 0)
         @foreach ($bodyDatas as $keyItem => $item)
            <tr>
               @if ($numbering)
                  <td>{{$keyItem + 1}}</td>
               @endif
               @if ($checkbox)
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox">
                  </td>
               @endif
               @foreach ($dataKey as $key)
                  <td>{{ $item[$key] }}</td>
               @endforeach
            </tr>
         @endforeach
      @else
         <tr>
            <td colspan="6" class="text-center">Tidak ada data</td>
         </tr>
      @endif
   </tbody>
</table>
{{-- Table End --}}
