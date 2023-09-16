<?php
$user = auth('frontend')->user();
$visaApplications = $user->visa_applications;
?>
<x-front::layout.my-account>
    <div class="flex flex-col space-y-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full px-1 sm:px-6 lg:px-8">
                <div class="shadow dark:border dark:border-neutral-800 overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-800">
                        <thead class="bg-neutral-50 dark:bg-neutral-800">
                        <tr class="text-left text-xs font-medium text-neutral-500 dark:text-neutral-300 uppercase tracking-wider">
                            <th scope="col" class="px-6 py-3">Photos</th>
                            <th scope="col" class="px-6 py-3">Submit Date</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Payment</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-800">
                        @foreach($visaApplications as $visaApplication)
                            <tr>
                                <td class="px-6 py-4">
                                        <a-image-preview-group>

                                            @foreach($visaApplication->applicants as $applicant)
                                                <a-image style="object-fit: cover;height: 50px;margin-right:5px"
                                                         class="!mr-2" :width="50" :height="50"
                                                         src="{{url($applicant->profile_photo)}}"/>
                                                <a-image style="object-fit: cover;height: 50px;margin-right:5px"
                                                         class="!mr-2" :width="50" :height="50"
                                                         src="{{url($applicant->passport_photo)}}"/>
                                            @endforeach
                                        </a-image-preview-group>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 rounded-full ">
                                        {{$visaApplication->created_at->format('M d,Y')}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 ">
                                        @if($visaApplication->status == 'pending-preview')
                                            <span
                                                class="bg-yellow-100  text-ellipsis text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Pending Preview</span>
                                        @endif
                                        @if($visaApplication->status == 'rejected')
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Rejected</span>
                                        @endif
                                        @if($visaApplication->status == 'approved' || $visaApplication->status == 'exported')
                                            <span
                                                class="bg-green-100 text-ellipsis text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Approved</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-500 dark:text-neutral-400">
                                    @if($visaApplication->payment_status == 'waiting')
                                        <span
                                            class="bg-yellow-100  text-ellipsis text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{$visaApplication->payment_status}}</span>
                                    @else
                                        <span
                                            class="bg-green-100 text-ellipsis text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{$visaApplication->payment_status}}</span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-front::layout.my-account>
