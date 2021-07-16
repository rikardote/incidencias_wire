<div class="px-4 py-4 sm:px-6 lg:px-8">

    <table class="w-full mt-4 bg-white shadow-lg ">
        <tr>
          <th class="px-8 py-4 text-center bg-blue-100 border">Quincena</th>
          <th class="px-8 py-4 text-center bg-blue-100 border">Año</th>
          <th class="px-8 py-4 text-center bg-blue-100 border">Descripción</th>
          <th class="px-8 py-4 text-center bg-blue-100 border">Status</th>
        </tr>
        @foreach ($qnas as $qna)
            <tr>
                <td class="px-8 py-4 text-center border">{{ $qna->qna }}</td>
                <td class="px-8 py-4 text-center border">{{ $qna->year }}</td>
                <td class="px-8 py-4 text-center border">{{ $qna->description }}</td>
                <td class="px-8 py-4 text-center border">
                    @livewire('toggle-switch', ['model'=>$qna, 'field'=>'active'], key( $qna->id ))
                </td>
            </tr>
        @endforeach
      </table>
</div>
