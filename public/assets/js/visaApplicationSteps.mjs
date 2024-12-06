
const visaApplicationStepsArr = [
    {
        id: 1,
        stepName: "Choose Your Visa Type",
        stepDescription: "Select the visa type that best suits your travel purpose, whether it’s for tourism, business, or study. Our easy-to-use platform helps you find the right visa quickly."
    },
    {
        id: 2,
        stepName: "Fill Out the Application",
        stepDescription: "Complete our simplified online application form with your personal details and travel information. The form is secure, and your data is protected."
    },
    {
        id: 3,
        stepName: "Upload Required Documents",
        stepDescription: "Upload all necessary documents, such as your passport, photograph, and supporting documents. Our document checklist makes it easy to ensure nothing is missed."
    },
    {
        id: 4,
        stepName: "Make Payment",
        stepDescription: "Pay the visa application fee securely online. Multiple payment options are available for your convenience."
    },
    {
        id: 5,
        stepName: "Track Your Application",
        stepDescription: "Receive real-time updates and track your visa application status from submission to approval."
    },
    {
        id: 6,
        stepName: "Receive Your Visa",
        stepDescription: "Get your visa delivered to your email or address. Start preparing for your journey!"
    }
]


const visaApplicationStepsEl = document.getElementById("visa-application-steps")



visaApplicationStepsArr.map((val, key) => {
    visaApplicationStepsEl.innerHTML += `
    <div class="col-md-4" key=${key}>
    <div class="card shadow mb-3 p-2">
        <h4 class="card-text">Step ${val.id}: ${val.stepName}</h4>
        <p>${val.stepDescription}</p>
        </div>
    </div>
    `
})


const visaAppWorkingArr = [
    {
        id: 1,
        processName: "Easy Online Application",
        processDesc: "Apply for your visa from the comfort of your home with our user-friendly interface. The process is streamlined to save you time and effort."
    },
    {
        id: 2,
        processName: "Fast Processing",
        processDesc: "Our team of experts reviews your application for completeness and accuracy, speeding up the approval process. We handle the complexities so you don’t have to."
    },
    {
        id: 3,
        processName: "Secure and Reliable",
        processDesc: "Your personal data and documents are secure with our state-of-the-art encryption technology. We prioritize your privacy and safety."
    },
]

const visaApplicationWorkingEl = document.getElementById("visa-application-working")



visaAppWorkingArr.map(item => {
    visaApplicationWorkingEl.innerHTML +=
    `
     <div class="col-md-4" key=${item.id}>
    <div class="card shadow mb-3 p-2">
        <h4 class="card-text">Step ${item.id}: ${item.processName}</h4>
        <p>${item.processDesc}</p>
        </div>
    </div>
    `
})
