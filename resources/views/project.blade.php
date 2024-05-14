<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Transaksi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Item
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$loop->iteration}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->no_transaction}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->total_item}}
                    </td>
                    <td class="px-6 py-4">
                       {{$item->total_qyi}}
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">View</button>
                        <form action="{{route('project.edit',['id'=>$item->id])}}" method="POST">
                            @csrf
                            @method('get')
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Edit</button>
                        </form>

                        <form action="{{ route('project.delete',['id'=>$item->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
        <!-- form -->


        <div class="w-full max-w-sm p-4 m-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            @if (session('success'))
            <div class="alert alert-danger">
                {{session('success')}}
            </div>
                
            @endif
            <form class="space-y-6" id="form-transaction" action="{{route('project.post')}}" method="post">
                @csrf
                <div>
                    <label for="no_trans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Transaction</label>
                    <input type="text" name="no_trans" id="no_trans" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div>
                    <label for="no_trans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Transaction</label>
                    <input type="date" name="date_trans" id="date_trans" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <button type="button" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">ADD ITEM</button>
                <div>
                    <label for="item_trans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
                    <input type="text" name="item_trans" id="item_trans" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div>
                    <label for="qyi_trans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" name="qyi_trans" id="qyi_trans" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Input Data</button>
            </form>
        </div>

    </div>

</x-layout>