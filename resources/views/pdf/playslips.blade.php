<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
        <!-- Header -->
        <div class="text-center border-b pb-4 mb-6">
            <h1 class="text-3xl font-bold text-indigo-700">Company Name</h1>
            <p class="text-sm text-gray-500">Official Payslip</p>
        </div>

        <!-- Employee Details -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Employee Details</h2>
            <div class="grid grid-cols-2 text-sm gap-y-1">
                <p><span class="font-medium">Name:</span> John Doe</p>
                <p><span class="font-medium">Employee ID:</span> EMP-001</p>
                <p><span class="font-medium">Designation:</span> Software Engineer</p>
                <p><span class="font-medium">Department:</span> IT</p>
                <p><span class="font-medium">Payslip for:</span> July 2025</p>
                <p><span class="font-medium">Date Issued:</span> 26 July 2025</p>
            </div>
        </div>

        <!-- Salary Breakdown Table -->
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Salary Breakdown</h2>
        <table class="w-full border-collapse mb-6">
            <thead>
                <tr class="bg-indigo-100 text-left">
                    <th class="border p-2">Description</th>
                    <th class="border p-2 text-right">Amount (Rs)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-2">Basic Salary</td>
                    <td class="border p-2 text-right">80,000</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border p-2">House Allowance</td>
                    <td class="border p-2 text-right">10,000</td>
                </tr>
                <tr>
                    <td class="border p-2">Transport Allowance</td>
                    <td class="border p-2 text-right">5,000</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border p-2 font-semibold">Gross Salary</td>
                    <td class="border p-2 text-right font-semibold">95,000</td>
                </tr>
            </tbody>
        </table>

        <!-- Deductions -->
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Deductions</h2>
        <table class="w-full border-collapse mb-6">
            <thead>
                <tr class="bg-red-100 text-left">
                    <th class="border p-2">Deduction</th>
                    <th class="border p-2 text-right">Amount (Rs)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-2">NSSF</td>
                    <td class="border p-2 text-right">500</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border p-2">SHIF</td>
                    <td class="border p-2 text-right">300</td>
                </tr>
                <tr>
                    <td class="border p-2">PAYE</td>
                    <td class="border p-2 text-right">2,500</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border p-2 font-semibold">Total Deductions</td>
                    <td class="border p-2 text-right font-semibold">3,300</td>
                </tr>
            </tbody>
        </table>

        <!-- Net Pay -->
        <div class="text-right">
            <p class="text-xl font-bold text-gray-800">Net Pay:
                <span class="text-green-600">Rs 91,700</span>
            </p>
        </div>

        <!-- Footer -->
        <div class="border-t mt-6 pt-4 text-sm text-gray-500 text-center">
            <p>This is a system-generated payslip and does not require a signature.</p>
        </div>
    </div>
</body>
</html>

