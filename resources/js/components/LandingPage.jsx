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

function LandingPage() {
    const totalQuestionsPerPage = 3;
    const [questions, setQuestions] = useQuestions();
    const [questionsWithAnswers, setQuestionsWithAnswers] = useState([]);
    const [pageNumber, setPage] = useState(0);
    const [totalPagination, setTotalPagination] = useState(0);
    useEffect(() => {
        gettingQuestions();
    }, []);

    useEffect(() => {}, [pageNumber]);
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

    return (
        <div className="container">
            <Navbar />
            <div className="row justify-content-center">
                <div className="questions">
                    <Questions
                        prefix="QAmb"
                        array={"ambLaboral"}
                        pagination={pageNumber}
                        totalPagination={totalPagination}
                        totalQuestionsPerPage={totalQuestionsPerPage}
                        questions={questions.ambLaboral}
                        setQuestions={setQuestions}
                    />
                    <Questions
                        prefix="QApt"
                        array={"aptitudes"}
                        pagination={pageNumber}
                        totalPagination={totalPagination}
                        totalQuestionsPerPage={totalQuestionsPerPage}
                        questions={questions.aptitudes}
                        setQuestions={setQuestions}
                    />
                    <Questions
                        prefix="QPer"
                        array={"personalidades"}
                        pagination={pageNumber}
                        totalPagination={totalPagination}
                        totalQuestionsPerPage={totalQuestionsPerPage}
                        questions={questions.personalidades}
                        setQuestions={setQuestions}
                    />
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
            </div>
        </div>
    );
}

export default LandingPage;

if (document.getElementById("app")) {
    ReactDOM.render(<LandingPage />, document.getElementById("app"));
}
