import React, { useState } from "react";
import Radio from "@mui/material/Radio";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import FormControl from "@mui/material/FormControl";
import FormLabel from "@mui/material/FormLabel";
import "./Questions.scss";
const Questions = ({
    pagination,
    prefix,
    totalPagination,
    totalQuestionsPerPage,
    questions,
    setQuestions,
    array,
}) => {
    const [answers, setAnswers] = useState([
        {
            id: 0,
            answer: "Nada",
            value: 0,
        },
        {
            id: 1,
            answer: "Poco",
            value: 1,
        },
        {
            id: 2,
            answer: "Mucho",
            value: 2,
        },
    ]);
    const handleClick = (e, id, value) => {
        e.preventDefault();
        console.log(e.target, id, value);
        setQuestions((prev) => {
            console.log(prev[array]);
            prev[array] = prev[array].map((item) => {
                if (item.id === id) {
                    item.answerSelected = value;
                    item[prefix + id] = value;
                    console.log(item);
                }
                return item;
            });
            return prev;
        });
    };

    return (
        <FormControl>
            {questions && (
                <>
                    {/* {handleDebugger()} */}
                    {questions.map((item, idx) => {
                        console.log(item);
                        if (
                            pagination == 1 &&
                            idx < pagination * totalQuestionsPerPage
                        ) {
                            return (
                                <>
                                    <FormLabel id={`radio-label-${item.id}`}>
                                        {item.pregunta}
                                    </FormLabel>
                                    <RadioGroup
                                        aria-labelledby={`radio-label-${item.id}`}
                                        name={`radio-${item.id}`}
                                    >
                                        {answers.map((answer) => (
                                            <FormControlLabel
                                                checked={
                                                    item.answerSelected !==
                                                    undefined
                                                        ? item.answerSelected ==
                                                          answer.value
                                                        : false
                                                }
                                                value={answer.id}
                                                name={`${prefix}-${item.id}`}
                                                control={<Radio />}
                                                label={answer.answer}
                                                onClick={(e) =>
                                                    handleClick(
                                                        e,
                                                        item.id,
                                                        answer.id
                                                    )
                                                }
                                            />
                                        ))}
                                    </RadioGroup>
                                </>
                            );
                        } else if (
                            pagination > 1 &&
                            idx < (pagination + 1) * totalQuestionsPerPage &&
                            idx >= pagination * totalQuestionsPerPage
                        ) {
                            return (
                                <>
                                    <FormLabel id={`radio-label-${item.id}`}>
                                        {item.pregunta}
                                    </FormLabel>
                                    <RadioGroup
                                        aria-labelledby={`radio-label-${item.id}`}
                                        name={`radio-${item.id}`}
                                    >
                                        {answers.map((answer) => (
                                            <FormControlLabel
                                                checked={
                                                    answer.id ===
                                                    item.answerSelected
                                                }
                                                value={answer.id}
                                                name={`${prefix}-${item.id}`}
                                                control={<Radio />}
                                                label={answer.answer}
                                                onClick={(e) =>
                                                    handleClick(
                                                        e,
                                                        item.id,
                                                        answer.id
                                                    )
                                                }
                                            />
                                        ))}
                                    </RadioGroup>
                                </>
                            );
                        }
                    })}
                </>
            )}
        </FormControl>
    );
};

const Question = ({ handleClick, answers, prefix, item }) => {
    const isChecked = (value) => {
        console.log(item.answerSelected, value);
        if (item.answerSelected === value) {
            return true;
        }
        return false;
    };

    return null;
};
export default Questions;
