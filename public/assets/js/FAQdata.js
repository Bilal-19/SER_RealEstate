const allFAQ = [
    {
        id: 1,
        questionID: "questionOne",
        answerID: "answerOne",
        question: "How do I place an order?",
        answer: "You can place an order by visiting Order Food page, where you need to provide information such as your name, email address, select the category of event (weddding, birthday party etc)."
    },
    {
        id: 2,
        questionID: "questionTwo",
        answerID: "answerTwo",
        question: "What is your refund policy?",
        answer: "Carefully read all the instructions provided with the form. Provide accurate information, complete all sections, use only the required format (usually block letters), and avoid making any corrections or overwriting."
    },
    {
        id: 3,
        questionID: "questionThree",
        answerID: "answerThree",
        question: "What should I do if I make a mistake on the visa application form?",
        answer: "If the form is online, you may correct the information before submission. For paper forms, fill out a new form or check with the embassy or consulate for guidance on making corrections."
    },
    {
        id: 4,
        questionID: "questionFour",
        answerID: "answerFour",
        question: "Do I need to complete a separate application form for each family member?",
        answer: "Yes, generally, each family member, including children, must complete a separate visa application form unless otherwise specified by the embassy or consulate."
    },
    {
        id: 5,
        questionID: "questionFive",
        answerID: "answerFive",
        question: "How long does it take to process a visa application?",
        answer: "Processing times vary by country, visa type, and the applicant's circumstances, typically ranging from a few days to several weeks or even months."
    },
    {
        id: 6,
        questionID: "questionSix",
        answerID: "answerSix",
        question: "What happens if my visa application is denied?",
        answer: "You will receive a notification explaining the reason for denial. You may be able to appeal the decision, apply again after addressing the issues, or seek advice from an immigration lawyer."
    },
    {
        id: 7,
        questionID: "questionSeven",
        answerID: "answerSeven",
        question: "Can I apply for a visa online?",
        answer: "Many countries offer online visa applications through their official government or consulate websites. Check the specific country's visa application process to confirm."
    },
    {
        id: 8,
        questionID: "questionEight",
        answerID: "answerEight",
        question: "How do I know which visa type to apply for?",
        answer: "The type of visa you need depends on the purpose of your visit (e.g., tourism, work, study, transit). Review the visa options on the official website of the embassy or consulate of the country you plan to visit."
    }
]

const FQA_El = document.getElementById("accordionFlushExample")

allFAQ.map(item => {
    FQA_El.innerHTML +=
        `
 <div class="accordion-item mt-2 border border-secondary">
    <h2 class="accordion-header" id="flush-${item.questionID}">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#${item.answerID}" aria-expanded="false" aria-controls="${item.answerID}">
        <b>${item.question}</b>
    </button>
    </h2>
    <div id="${item.answerID}" class="accordion-collapse collapse" aria-labelledby="flush-${item.questionID}" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">${item.answer}</div>
    </div>
</div>
`
})
