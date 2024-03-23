<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('task.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Create
            </a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @php /** @var App\Models\Task[]|\Illuminate\Database\Eloquent\Collection $tasks */ @endphp
                @foreach($tasks as $task)
                    <div class="w-full p-4 my-3 bg-white rounded-md shadow-md">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-light text-gray-800">Task</span>
                            <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full">
                                    {{ $task->done ? 'Done' : 'Active' }}
                            </span>
                        </div>

                        <div>
                            <h3 class="mt-2 text-lg font-semibold text-gray-800">{{ $task->title }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ $task->description }}</p>
                        </div>

                        <div class="items-center">
                            <div class="flex">
                                <div
                                    class="flex overflow-hidden bg-white border divide-x rounded-lg rtl:flex-row-reverse">
                                    @if(!$task->done)
                                        <form method="post" action="{{ route('task.mark-as-done') }}">
                                            @csrf
                                            <input type="hidden" name="task-id" value="{{$task->id}}">
                                            <button
                                                class="px-4 py-2 text-sm font-medium text-gray-600 transition-colors duration-200 sm:text-base sm:px-6 hover:bg-gray-100">
                                                Mark as Done
                                            </button>
                                        </form>
                                    @endif
                                    <form method="post" action="{{ route('task.destroy') }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="task-id" value="{{$task->id}}">
                                        <button
                                            class="px-4 py-2 text-sm font-medium text-gray-600 transition-colors duration-200 sm:text-base sm:px-6 hover:bg-gray-100">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
