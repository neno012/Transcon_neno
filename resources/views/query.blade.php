<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">Soal 1</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">"SELECT activities.title,activity_details.type, SUM(activity_details.weight) as total_weight From activity_details LEFT JOIN activities ON activity_details.id_activity=activities.id GROUP by activity_details.id_activity,activity_details.type;"</p>
                </div>
            </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">Soal 2</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">"SELECT activities.title,COUNT(activity_details.type)as total_detail_activity,SUM(activity_details.weight)as total_weight FROM activities INNER JOIN activity_details ON activities.id=activity_details.id_activity GROUP BY activities.title;"</p>
                </div>
            </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">Soal 3</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">"SELECT activities.title,COUNT(DISTINCT activity_details.type)as total_detail_type,SUM(activity_details.weight)as total_weight FROM activities INNER JOIN activity_details ON activities.id=activity_details.id_activity GROUP BY activities.id;"</p>
                </div>
            </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">Soal 4</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">"SELECT activities.title,activity_details.type,activity_details.weight FROM activities LEFT JOIN activity_details ON activities.id=activity_details.id_activity ORDER BY weight DESC"</p>
                </div>
            </div>
        </li>

    </ul>

</x-layout>