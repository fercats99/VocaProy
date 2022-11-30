import { useEffect } from "react";
import { useState } from "react";

const useQuestions = () => {
    const questionsOnLocalStorage = JSON.parse(
        localStorage.getItem("questions")
    );
    const [currentQuestion, setCurrentQuestion] = useState(
        questionsOnLocalStorage != undefined ? questionsOnLocalStorage : []
    );
    useEffect(() => {
        console.log("useEffect", currentQuestion);
    }, [questionsOnLocalStorage]);
    const handleAnswerOptionClick = (id, value, type) => {
        setCurrentQuestion((prev) => {
            prev[type] = prev[type].map((question) => {
                if (question.id === id) {
                    question.answer = value;
                }
                return question;
            });
            return prev;
        });
        localStorage.setItem("questions", JSON.stringify(currentQuestion));
    };

    return [currentQuestion, setCurrentQuestion, handleAnswerOptionClick];
};
export default useQuestions;
