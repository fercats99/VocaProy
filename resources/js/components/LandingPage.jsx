import React, { useEffect, useState, MouseEvent } from "react";
import ReactDOM from "react-dom";
import { dummyQuestions } from "../utils/dummyQuestions";
import Pagination from "@mui/material/Pagination";
import PaginationItem from "@mui/material/PaginationItem";
import Stack from "@mui/material/Stack";
import ArrowBackIcon from "@mui/icons-material/ArrowBack";
import ArrowForwardIcon from "@mui/icons-material/ArrowForward";
import Questions from "./Questions";
//import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import axios from "axios";
import Navbar from "./Navbar/Navbar";
import useQuestions from "../utils/useQuestions";
import { Button } from "@mui/material";

function LandingPage() {
    const totalQuestionsPerPage = 3;
    const [questions, setQuestions, handleAnswerOptionClick] = useQuestions();
    const [questionsWithAnswers, setQuestionsWithAnswers] = useState([]);
    const [pageNumber, setPage] = useState(0);
    const [totalPagination, setTotalPagination] = useState(0);
    useEffect(() => {
        gettingQuestions();
    }, []);
    useEffect(() => {
        console.log("pageNumber", pageNumber, "/", totalPagination);
    }, [pageNumber]);
    const gettingQuestions = async () => {
        const response = await axios.get("/questionProcessing");

        setTotalPagination(
            Math.ceil(
                (response.data.ambLaboral.length +
                    response.data.ambLaboral.length +
                    response.data.personalidades.length) /
                    10
            )
        );
        setQuestions(response.data);
    };
    const handleSubmit = async () => {
        console.log("questions", questions);
        const questionsMerged = [
            ...questions.ambLaboral,
            ...questions.aptitudes,
            ...questions.personalidades,
        ];
        const questionsWithAnswers = {};
        questionsMerged.forEach((item) => {
            if (item.answerSelected) {
                questionsWithAnswers[item.answerName] = item.answerSelected;
            }
        });
        console.log("document.cookie", document.cookie.split("=")[1]);
        //questionsWithAnswers["_token"] = document.cookie.split("=")[1];
        console.log("questions", questionsWithAnswers);
        const response = await axios.post(
            "/questionProcessing",
            questionsWithAnswers
        );
        console.log("response", response);
    };
    return (
        <div className="container">
            <Navbar />
            <form className="row justify-content-center" action="POST">
                <div className="questions">
                    <Questions
                        key="ambLaboral"
                        prefix="QAmb"
                        array={"ambLaboral"}
                        pagination={pageNumber}
                        totalPagination={totalPagination}
                        totalQuestionsPerPage={totalQuestionsPerPage}
                        questions={questions.ambLaboral}
                        setQuestions={setQuestions}
                    />
                    <Questions
                        key="ambPersonal"
                        prefix="QApt"
                        array={"aptitudes"}
                        pagination={pageNumber}
                        totalPagination={totalPagination}
                        totalQuestionsPerPage={totalQuestionsPerPage}
                        questions={questions.aptitudes}
                        setQuestions={setQuestions}
                    />
                    <Questions
                        key="personalidades"
                        prefix="QPer"
                        array={"personalidades"}
                        pagination={pageNumber}
                        totalPagination={totalPagination}
                        totalQuestionsPerPage={totalQuestionsPerPage}
                        questions={questions.personalidades}
                        setQuestions={setQuestions}
                    />
                    {pageNumber === totalPagination && (
                        <div className="container_submit">
                            <Button variant="contained" onClick={handleSubmit}>
                                Calificar test
                            </Button>
                        </div>
                    )}
                </div>
                <div className="pagination">
                    <Pagination
                        count={totalPagination}
                        renderItem={(item) => {
                            if (item.selected) {
                                setPage(item.page);
                            }
                            return (
                                <PaginationItem
                                    slots={{
                                        previous: ArrowBackIcon,
                                        next: ArrowForwardIcon,
                                    }}
                                    {...item}
                                />
                            );
                        }}
                    />
                </div>
            </form>
        </div>
    );
}

export default LandingPage;

if (document.getElementById("app")) {
    ReactDOM.render(<LandingPage />, document.getElementById("app"));
}
