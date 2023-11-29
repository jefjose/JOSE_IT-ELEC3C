<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12   ">
        <div class="max-w-7xxl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Category Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Added By (User ID - User Name)
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Created At
                                </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Updated At
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($categories as $category)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ ++$i }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $category->category_name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        @if ($category->image)
                                            <img src="{{ Storage::url($category->image) }}" alt="img"
                                                class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('placeholder.jpg') }}" alt="img"
                                                class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @foreach ($users as $user)
                                            @if ($category->user_id === $user->id)
                                                {{ $category->user_id . ' - ' . $user->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $category->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $category->updated_at }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        <div class="col-md-2 mb-2 ">
                                            <form method="GET"
                                                action="{{ route('category.edit', ['id' => $category->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary w-100">Edit</button>
                                            </form>
                                        </div>
                                        <div class="col-md-2 mb-2 ">
                                            <form method="POST"
                                                action="{{ route('category.destroy', ['id' => $category->id]) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary w-100">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    <a class="btn btn-primary" href="{{ route('category.form') }}">Add Category</a>
                                </th>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="py-12   ">
            <div class="max-w-7xxl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Category Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Added By (User ID - User Name)
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Created At
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        Updated At
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Deleted At
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $deletedCategories = \App\Models\Category::onlyTrashed()->get();
                                    $i = 0;
                                @endphp
                                @foreach ($deletedCategories as $deletedCategory)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            {{ ++$i }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $deletedCategory->category_name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            @if ($deletedCategory->image)
                                                <img src="{{ Storage::url($deletedCategory->image) }}" alt="img"
                                                    class="img-thumbnail">
                                            @else
                                                <img src="{{ asset('placeholder.jpg') }}" alt="img"
                                                    class="img-thumbnail">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @foreach ($users as $user)
                                                @if ($deletedCategory->user_id === $user->id)
                                                    {{ $deletedCategory->user_id . ' - ' . $user->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            {{ $deletedCategory->created_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $deletedCategory->updated_at }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            {{ $deletedCategory->deleted_at }}
                                        </td>
                                        <td
                                            class="px-6 py-4 ">
                                            <div class="col-md-2 mb-2 ">
                                                <form method="POST"
                                                    action="{{ route('category.restore', ['id' => $deletedCategory->id]) }}" onsubmit="return confirm('Are you sure you want to restore this category?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary w-100">Restore</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
</x-app-layout>
