import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { dummyQuestions } from "../utils/dummyQuestions";
import PaginatedItems from "./Pagination/Pagination";

function LandingPage() {
    const [questions, setQuestions] = useState([]);
    const [questionsWithAnswers, setQuestionsWithAnswers] = useState([]);
    useEffect(() => {
        setQuestions(dummyQuestions);
        setQuestionsWithAnswers(dummyQuestions);
    }, [dummyQuestions]);

    return (
        <div className="container">
            <div className="row justify-content-center">
                <PaginatedItems
                    itemsPerPage={3}
                    data={questions}
                    setQuestions={setQuestions}
                />
            </div>
        </div>
    );
}

export default LandingPage;

if (document.getElementById("app")) {
    ReactDOM.render(<LandingPage />, document.getElementById("app"));
}
