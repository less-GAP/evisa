import dayjs from "dayjs";
import utc from "dayjs/plugin/utc";
import timezone from "dayjs/plugin/timezone";
import dayjsBusinessTime from 'dayjs-business-time';

dayjs.extend(utc);
dayjs.extend(timezone);

// Attach dayjs plugin
dayjs.extend(dayjsBusinessTime);
const businessTimes = {
    sunday: null,
    monday: [
        {start: '09:00:00', end: '17:00:00'}
    ],
    tuesday: [
        {start: '09:00:00', end: '17:00:00'}

    ],
    wednesday: [
        {start: '09:00:00', end: '17:00:00'}
    ],
    thursday: [
        {start: '09:00:00', end: '17:00:00'}
    ],
    friday: [
        {start: '09:00:00', end: '17:00:00'}
    ],
    saturday: null,
}

// Set Business Times in dayjs
dayjs.setBusinessTime(businessTimes);
const holidays= [
];

// Add holidays to dayjs
dayjs.setHolidays(holidays);

dayjs.tz.setDefault('Asia/Ho_Chi_Minh')



export default dayjs;
