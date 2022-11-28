import React, { useEffect, useState, MouseEvent } from "react";
import ReactDOM from "react-dom";
import { dummyQuestions } from "../utils/dummyQuestions";
import Pagination from "@mui/material/Pagination";
import PaginationItem from "@mui/material/PaginationItem";
import Stack from "@mui/material/Stack";
import ArrowBackIcon from "@mui/icons-material/ArrowBack";
import ArrowForwardIcon from "@mui/icons-material/ArrowForward";
import Questions from "./Questions";

function LandingPage() {
    const totalQuestionsPerPage = 5;
    const [questions, setQuestions] = useState([]);
    const [questionsWithAnswers, setQuestionsWithAnswers] = useState([]);
    const [pageNumber, setPage] = useState(0);
    const [totalPagination, setTotalPagination] = useState(
        Math.ceil(dummyQuestions.length / totalQuestionsPerPage)
    );
    useEffect(() => {
        setQuestions(dummyQuestions);
        setQuestionsWithAnswers(dummyQuestions);
        setTotalPagination(
            Math.ceil(dummyQuestions.length / totalQuestionsPerPage)
        );
    }, [dummyQuestions]);

    useEffect(() => {
        console.log(
            "page actual",
            pageNumber,
            totalPagination,
            dummyQuestions.length
        );
    }, [pageNumber]);

    return (
        <div className="container">
            <div className="row justify-content-center">
                <Questions
                    pagination={pageNumber}
                    totalPagination={totalPagination}
                    totalQuestionsPerPage={totalQuestionsPerPage}
                    questions={questions}
                    setQuestions={setQuestions}
                />
                <Pagination
                    count={totalPagination}
                    renderItem={(item) => {
                        console.log(item);
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
        </div>
    );
}

export default LandingPage;

if (document.getElementById("app")) {
    ReactDOM.render(<LandingPage />, document.getElementById("app"));
}
