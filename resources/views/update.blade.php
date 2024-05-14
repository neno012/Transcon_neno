<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="relative overflow-x-auto">
        <!-- form -->
        <div class="w-full max-w-sm p-4 m-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            @if (session('success'))
            <div class="alert alert-danger">
                {{session('success')}}
            </div>
                
            @endif
            <form class="space-y-6" id="form-transaction" action="{{route('project.update',['id'=>$id])}}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="no_trans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Transaction</label>
                    <input type="text" name="no_trans" id="no_trans" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$data->no_transaction }}" required />
                </div>
                <div>
                    <label for="no_trans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Transaction</label>
                    <input type="date" name="date_trans" id="date_trans" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$data->transaction_date}}" required />
                </div>
                <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
            </form>
        </div>

    </div>
</x-layout>